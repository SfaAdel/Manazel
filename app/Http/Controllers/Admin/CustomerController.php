<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');

        // Apply the search condition before pagination
        $query = Customer::withCount([
            'appointments', // Total appointments count
            'appointments as completed_appointments_count' => function ($query) {
                $query->where('status', 'completed'); // Assuming 'status' is the column in appointments table
            },
            'appointments as pending_appointments_count' => function ($query) {
                $query->where('status', 'pending'); // Assuming 'status' is the column in appointments table
            }
        ]);

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

     public function orders()
     {
         $navCategories = Category::latest()->get();
         $setting = Setting::first();

         $customer = Auth::guard('customer')->user();
        //  $appointments = $customer->appointments->with('subService')->latest()->get();

         $appointments = Appointment::where('customer_id', auth('customer')->user()->id)->get();

         return view('front.profile.orders', compact('setting', 'customer', 'navCategories', 'appointments'));
     }

     public function cancelAppointment($id)
     {
         $appointment = Appointment::where('customer_id', Auth::id())->findOrFail($id);

         if ($appointment->status != 'canceled') {
             $appointment->delete();
             return redirect()->back()->with('success', 'تم إلغاء الموعد بنجاح.');
         }

         return redirect()->back()->with('error', 'لا يمكن إلغاء هذا الموعد.');
     }

     public function edit()
    {
        $navCategories = Category::latest()->get();
        $setting = Setting::first();

        $customer = Auth::guard('customer')->user();
        return view('front.profile.edit', compact('setting', 'customer', 'navCategories'));
    }

    public function update(CustomerRequest $request)
    {
        /** @var Customer $customer */
        $customer = Auth::guard('customer')->user();

        $data = $request->only(['name', 'phone']);


        if ($request->hasFile('profile_img')) {
            $ImageName = time() . '.' . $request->profile_img->extension();
            $request->profile_img->move(('images/customers'), $ImageName);
            $customer->update(['profile_img' => $ImageName]);
        }

        // $customer->update($data);

        return redirect()->back()->with('success', 'تم تعدييل البيانات بنجاح');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        /** @var \App\Models\Customer $customer */
        $customer = Auth::guard('customer')->user();

        if (!Hash::check($request->current_password, $customer->password)) {
            return redirect()->back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
        }

        $customer->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'تم تغيير كلمة المرور بنجاح');
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
