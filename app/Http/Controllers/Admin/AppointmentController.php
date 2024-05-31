<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
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
        $appointment = Appointment::create($request->except( '_token')+
        ['order_id' => 1]);

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

        return response()->json(['message' => 'Appointment booked successfully']);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
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
