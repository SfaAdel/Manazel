<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $search = request()->input('search');

    // Apply the search condition before pagination
    $query = Customer::query();

    if ($search) {
        $query->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
        });
    }

    $customers = $query->latest()->paginate(10);

    return view('admin.customers.index', compact('customers', 'search'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $navCategories = Category::latest()->get();
        $setting= setting::first();

        $customer = Auth::guard('customer')->user();
        return view('front.profile.edit', compact('setting','customer','navCategories'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'phone' => 'required|string|max:255|' . $customer->id,
        //     'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // Add other validation rules as needed
        // ]);

        $data = $request->only(['name', 'phone']); // Extract the necessary fields

        if ($request->hasFile('profile_img')) {
            $imageName = time().'.'.$request->profile_img->extension();
            $request->profile_img->move(public_path('images/customers'), $imageName);
            $data['profile_img'] = 'images/customers/' . $imageName;
        }

        $customer->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('delete', 'تم حذف البيانات بنجاح');

    }
}
