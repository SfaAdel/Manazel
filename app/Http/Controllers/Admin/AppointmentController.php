<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Provider;
use App\Models\SubService;
use App\Models\SubServiceAvailability;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

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


        $appointments = $appointments->paginate(10);
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
   // In AppointmentController.php
   private function getAvailableProvidersForSubServiceOnDate(SubService $subService, Carbon $date, $selectedProviderId = null)
   {
       $category = $subService->service->category;

       if (!$category) {
           return collect();
       }

       // Get the IDs of appointments for the same sub-service at the same day and time
       $bookedAppointmentIds = Appointment::where('sub_service_id', $subService->id)
           ->where('day', $date->format('Y-m-d'))
           ->where('time', $date->format('H:i:s'))
           ->pluck('provider_id')
           ->toArray();

       $query = Provider::where('category_id', $category->id)
           ->where('status', true)
           ->whereDoesntHave('providerAvailabilities', function ($query) use ($date) {
               $query->whereJsonContains('off_days', $date->toDateString());
           });

       // Exclude the selected provider for the current appointment
       if ($selectedProviderId !== null) {
           $query->where('id', '!=', $selectedProviderId);
       }

       // Exclude providers already assigned to appointments at the same day and time
       $query->whereNotIn('id', $bookedAppointmentIds);

       return $query->get();
   }

   public function show(Appointment $appointment)
   {
       $availableProviders = collect();

       if ($appointment->subService && $appointment->subService->service && $appointment->subService->service->category) {
           $categoryId = $appointment->subService->service->category->id;
           $selectedProviderId = $appointment->provider_id;
           $availableProviders = $this->getAvailableProvidersForSubServiceOnDate($appointment->subService, Carbon::parse($appointment->day), $selectedProviderId);
       }

       return view('admin.appointments.show', compact('appointment', 'availableProviders'));
   }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    public function bookAppointment(AppointmentRequest $request)
    {
        try {
            // Validate and create the appointment
            $appointment = Appointment::create($request->except('_token'));

            // Check the number of already booked appointments for this sub_service at the same day and time
            $bookedCount = Appointment::where('sub_service_id', $appointment->sub_service_id)
                ->where('day', $appointment->day)
                ->where('time', $appointment->time)
                ->count();

            // Get the number of available providers for the sub_service on the same day
            $subService = SubService::find($appointment->sub_service_id);
            $availableProviders = $this->getAvailableProvidersForSubServiceOnDate($subService, Carbon::parse($appointment->day))->count();

            // If the number of booked appointments is equal to or greater than the number of providers
            if ($bookedCount >= $availableProviders) {
                // Mark the availability as false
                SubServiceAvailability::where('sub_service_id', $appointment->sub_service_id)
                    ->where('day', $appointment->day)
                    ->where('time', $appointment->time)
                    ->update(['availability' => false]);
            }

            return redirect()->back()->with('success', 'تم حجز الخدمة بنجاح');
        } catch (QueryException $e) {
            // Catch the exception for duplicate entry violation
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('error', 'لقد قمت بالفعل بحجز هذه الخدمة .');
            }
            // Handle other query exceptions or rethrow the exception
            throw $e;
        }
    }

  // In AppointmentController.php







    /**
     * Update the specified resource in storage.
     */

     public function update(AppointmentRequest $request, Appointment $appointment)
     {
         try {
             // Update the appointment status if provided
             if ($request->input('status')) {
                 $status = $request->input('status');
                 if ($status === 'canceled') {
                    // Mark the availability as true
                    SubServiceAvailability::where('sub_service_id', $appointment->sub_service_id)
                    ->where('day', $appointment->day)
                    ->where('time', $appointment->time)
                    ->update(['availability' => true]);

                     $appointment->delete();
                 } else {
                     $appointment->update(['status' => $status]);
                 }
             }

             // Update the provider_id if provided
             if ($request->filled('provider_id')) {
                 $appointment->update($request->only('provider_id'));
             }

             return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
         } catch (\Illuminate\Database\QueryException $e) {
             // Handle unique constraint violation
             if ($e->errorInfo[1] == 1062) { // MySQL error code for unique constraint violation
                 return redirect()->back()->withErrors(['provider_id' => 'هذا الفني لديه موعد آخر في هذا اليوم وهذا الوقت.']);
             }

             return redirect()->back()->withErrors(['error' => 'حدث خطأ غير متوقع. يرجى المحاولة لاحقًا.']);
         }
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
