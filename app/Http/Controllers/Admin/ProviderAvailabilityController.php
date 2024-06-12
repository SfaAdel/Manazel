<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProviderAvailabilityRequest;
use App\Models\Provider;
use App\Models\ProviderAvailability;
use Illuminate\Database\QueryException;

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

    public function store(ProviderAvailabilityRequest $request)
    {
        try {
            ProviderAvailability::create($request->validated());

            return redirect()->route('admin.provider_availabilities.index')->with('success', 'تم اضافة بيانات الموظف بنجاح.');
        } catch (QueryException $exception) {
            if ($exception->getCode() == '23000') {
                // 23000 is the SQL state for integrity constraint violation
                return redirect()->back()->withErrors(['month' => 'الاجازة لهذا الموظف في هذا الشهر موجودة بالفعل.'])->withInput();
            }
            throw $exception; // If it's a different error, throw it
        }
    }

    public function edit(ProviderAvailability $providerAvailability)
    {
        $providers = Provider::all();
        return view('admin.provider_availabilities.edit', compact('providerAvailability', 'providers'));
    }

    public function update(ProviderAvailabilityRequest $request, ProviderAvailability $providerAvailability)
    {
        try {
            $providerAvailability->update($request->validated());

            return redirect()->route('admin.provider_availabilities.index')->with('success', 'تم تعديل اجازات الموظف بنجاح.');
        } catch (QueryException $exception) {
            if ($exception->getCode() == '23000') {
                return redirect()->back()->withErrors(['month' => 'الاجازة لهذا الموظف في هذا الشهر موجودة بالفعل.'])->withInput();
            }
            throw $exception;
        }
    }

    public function destroy(ProviderAvailability $providerAvailability)
    {
        $providerAvailability->delete();
        return redirect()->route('admin.provider_availabilities.index')->with('success', 'تم حذف اجازات الموظف بنجاح');
    }
}
