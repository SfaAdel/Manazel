<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Provider;
use App\Models\SubService;
use App\Models\SubServiceAvailability;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $search = request()->input('search');
        $appointments = Appointment::latest();

        if ($search) {
            $appointments->where(function ($query) use ($search) {
                $query->where('day', 'like', '%' . $search . '%')
                      ->orWhereHas('customer', function ($query) use ($search) {
                          $query->where('name', 'like', '%' . $search . '%');
                      });
            });
        }


        $appointments = $appointments->paginate(5);
        // $providers = Provider::all(); // Fetch all providers to allow selection

        $appointments = Appointment::with(['customer', 'subService.service.category'])->get();

        // Get the category ID of each appointment's sub-service
        $providers = collect();
        foreach ($appointments as $appointment) {
            if ($appointment->subService && $appointment->subService->service && $appointment->subService->service->category) {
                $categoryId = $appointment->subService->service->category->id;
                $providers[$appointment->id] = Provider::where('category_id', $categoryId)->get();
            }
        }


        return view('admin.appointments.index', compact('appointments','search','providers'));
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
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    public function bookAppointment(Request $request)
    {


        // Create the appointment
        $appointment = Appointment::create($request->except( '_token'));

        // Check the number of already booked appointments for this sub_service at the same day and time
        $bookedCount = Appointment::where('sub_service_id', $appointment->sub_service_id)
            ->where('day', $appointment->day)
            ->where('time', $appointment->time)
            ->count();

        // Get the number of providers for the sub_service
        $subService = SubService::find($appointment->sub_service_id);
        $providerCount = $subService->providers;

        // If the number of booked appointments is equal to or greater than the number of providers
        if ($bookedCount >= $providerCount) {
            // Mark the availability as false
            SubServiceAvailability::where('sub_service_id', $appointment->sub_service_id)
                ->where('day', $appointment->day)
                ->where('time', $appointment->time)
                ->update(['availability' => false]);
        }

        // return response()->json(['message' => 'Appointment booked successfully']);
        return redirect()->back()->with('success', 'تم حجز الخدمة بنجاح');

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
        $status = $request->input('status');
        // Update the order status
        if ($status === 'canceled') {
            // Delete related appointments if the order is canceled
            $appointment->delete();
        }
        $appointment->update(['status' => $status]);

        $appointment->update($request->only('provider_id'));
        return redirect()->back()->with('success', 'تم تحديث مقدم الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
        $appointment->delete();
        return redirect()->back()->with('success', 'تم حذف الموعد بنجاح');
    }
}
