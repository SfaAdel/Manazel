<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Order;
use App\Models\Provider;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get filter inputs
        $day = $request->input('day');
        $status = $request->input('status');
        $subServiceId = $request->input('sub_service_id');
        $subCategoryId = $request->input('sub_category_id');
        $offDayFilter = $request->input('off_day_filter');

        // Get today's date
        $today = now()->format('Y-m-d');

        // Technicians statistics with off day filters
        $techniciansQuery = Provider::select('providers.*')
            ->leftJoin('provider_availabilities', 'providers.id', '=', 'provider_availabilities.provider_id');

            if ($offDayFilter === 'on') {
                $techniciansQuery->whereHas('providerAvailabilities', function ($query) use ($today) {
                    $query->whereJsonContains('off_days', $today);
                });
            } elseif ($offDayFilter === 'off') {
                $techniciansQuery->whereDoesntHave('providerAvailabilities', function ($query) use ($today) {
                    $query->whereJsonContains('off_days', $today);
                })->orWhereHas('providerAvailabilities', function ($query) use ($today) {
                    $query->whereJsonDoesntContain('off_days', $today);
                });
            }


        $technicians = $techniciansQuery->get();

        // Requests with optional filters
        // $requests = Appointment::select('sub_service_id', 'day', 'time', 'status')
        //     ->with(['subService' => function($query) {
        //         $query->select('id', 'name');
        //     }, 'provider:id,name']);

        $requests = Appointment::select('sub_service_id', 'day', 'time', 'status')
        ->with(['subService' => function($query) {
            $query->select('id', 'name');
        }, 'provider']); // Include the 'provider' relationship

    if ($day) {
        $requests->whereDate('day', $day);
    }

    if ($status) {
        $requests->where('status', $status);
    }

    if ($subServiceId) {
        $requests->where('sub_service_id', $subServiceId);
    }

    $requests = $requests->get();


        // Profits
        $profits = Appointment::join('sub_services', 'appointments.sub_service_id', '=', 'sub_services.id')
            ->select(
                DB::raw('count(appointments.id) as number_of_orders'),
                DB::raw('sum(sub_services.price) as total_profits')
            )
            ->first();

        // Counter for clicks on call and WhatsApp icons
        $callClicks = DB::table('clicks')->where('type', 'call')->count();
        $whatsappClicks = DB::table('clicks')->where('type', 'whatsapp')->count();

        // Service statistics with optional sub-category filter
        $serviceStatsQuery = SubService::select('sub_services.id', 'sub_services.name', DB::raw('count(appointments.id) as request_count'))
            ->leftJoin('appointments', 'sub_services.id', '=', 'appointments.sub_service_id')
            ->groupBy('sub_services.id', 'sub_services.name')
            ->orderBy('request_count', 'desc');

            if ($subCategoryId) {
                $serviceStatsQuery->where('sub_services.id', $subCategoryId);
            }


        $serviceStats = $serviceStatsQuery->get();

        // Get sub-categories for filter dropdown
        $subCategories = SubService::select('id', 'name')->get();

   // Get filter input
   $period = $request->input('period');

   // Set default period if not provided
   if (!$period) {
       $period = 'all';
   }

   // Get click counts based on the selected period
   $callClicks = $this->getClicks('call', $period);
   $whatsappClicks = $this->getClicks('whatsapp', $period);

    // Get filter input for profits
    $profitPeriod = $request->input('profit_period');

    // Set default period if not provided
    if (!$profitPeriod) {
        $profitPeriod = 'all';
    }

    // Get profits based on the selected period
    $profits = $this->getProfits($profitPeriod);

    $completedExternalRequests = DB::table('general_requests')
    ->where('status', 'completed')
    ->select(DB::raw('count(id) as count'), DB::raw('sum(price) as total_price'))
    ->first();

$completedExternalRequestsCount = $completedExternalRequests->count ?? 0;
$completedExternalRequestsProfits = $completedExternalRequests->total_price ?? 0;


return view('admin.index', compact('completedExternalRequestsProfits','completedExternalRequestsCount','profits', 'profitPeriod','callClicks', 'whatsappClicks', 'period','technicians', 'requests', 'profits', 'callClicks', 'whatsappClicks', 'serviceStats', 'day', 'subServiceId', 'offDayFilter', 'subCategories', 'subCategoryId'));
}

private function getClicks($type, $period)
{
    $query = DB::table('clicks')->where('type', $type);

    if ($period == 'today') {
        $query->whereDate('created_at', today());
    } elseif ($period == 'month') {
        $query->whereMonth('created_at', today()->month);
    } elseif ($period == 'year') {
        $query->whereYear('created_at', today()->year);
    }

    return $query->count();
}
private function getProfits($period)
{
    // Query to get the sum of prices and count from appointments
    $appointmentsQuery = Appointment::where('status', 'completed')
        ->select(
            DB::raw('sum(price) as total_appointments_profits'),
            DB::raw('count(id) as total_appointments_count')
        );

    // Query to get the sum of prices and count from general_requests
    $generalRequestsQuery = DB::table('general_requests')
        ->where('status', 'completed')
        ->select(
            DB::raw('sum(price) as total_general_requests_profits'),
            DB::raw('count(id) as total_general_requests_count')
        );

    // Apply the period filter to both queries
    if ($period == 'today') {
        $appointmentsQuery->whereDate('day', today());
        $generalRequestsQuery->whereDate('created_at', today());
    } elseif ($period == 'month') {
        $appointmentsQuery->whereMonth('day', today()->month);
        $generalRequestsQuery->whereMonth('created_at', today()->month);
    } elseif ($period == 'year') {
        $appointmentsQuery->whereYear('day', today()->year);
        $generalRequestsQuery->whereYear('created_at', today()->year);
    }

    // Get the results
    $appointmentsData = $appointmentsQuery->first();
    $generalRequestsData = $generalRequestsQuery->first();

    // Calculate totals
    $totalAppointmentsProfits = $appointmentsData->total_appointments_profits ?? 0;
    $totalGeneralRequestsProfits = $generalRequestsData->total_general_requests_profits ?? 0;
    $totalProfits = $totalAppointmentsProfits + $totalGeneralRequestsProfits;

    $totalAppointmentsCount = $appointmentsData->total_appointments_count ?? 0;
    $totalGeneralRequestsCount = $generalRequestsData->total_general_requests_count ?? 0;

    // Return combined data
    return (object)[
        'total_appointments_count' => $totalAppointmentsCount,
        'total_general_requests_count' => $totalGeneralRequestsCount,
        'total_profits' => $totalProfits,
        'total_appointments_profits' => $totalAppointmentsProfits,
        'total_general_requests_profits' => $totalGeneralRequestsProfits,
    ];
}


}
