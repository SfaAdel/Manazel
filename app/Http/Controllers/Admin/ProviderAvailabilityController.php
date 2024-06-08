<?php
// app/Http/Controllers/Admin/ProviderAvailabilityController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\ProviderAvailability;
use Illuminate\Http\Request;

class ProviderAvailabilityController extends Controller
{
    public function index()
    {
        $providerAvailabilities = ProviderAvailability::latest()->paginate(10);
        return view('admin.provider_availabilities.index', compact('providerAvailabilities'));
    }

    public function create()
    {
        $providers = Provider::all();
        return view('admin.provider_availabilities.create', compact('providers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'month' => 'required|date_format:Y-m|unique:provider_availabilities,month,null,null,provider_id,'.$request->provider_id,
            'off_days' => 'required|array',
            'off_days.*' => 'date_format:Y-m-d',
        ], [
            'month.unique' => 'The combination of provider and month already exists.',
        ]);

        ProviderAvailability::create([
            'provider_id' => $validated['provider_id'],
            'off_days' => json_encode($validated['off_days']),
            'month' => $validated['month'],
        ]);

        return redirect()->route('admin.provider_availabilities.index')->with('success', 'تم اضافة بيانات الموظف بنجاح.');
    }

    public function edit(ProviderAvailability $providerAvailability)
    {
        $providers = Provider::all();
        return view('admin.provider_availabilities.edit', compact('providerAvailability', 'providers'));
    }

    public function update(Request $request, ProviderAvailability $providerAvailability)
    {
        $validated = $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'off_days' => 'required|array',
            'off_days.*' => 'date_format:Y-m-d',
            'month' => 'required|date_format:Y-m',
        ]);

        $providerAvailability->update([
            'provider_id' => $validated['provider_id'],
            'off_days' => json_encode($validated['off_days']),
            'month' => $validated['month'],
        ]);

        return redirect()->route('admin.provider_availabilities.index')->with('success', 'تم تعديل اجازات الموظف بنجاح.');
    }

    public function destroy(ProviderAvailability $providerAvailability)
    {
        $providerAvailability->delete();
        return redirect()->route('admin.provider_availabilities.index')->with('success', 'تم حذف اجازات الموظف بنجاح');
    }
}

