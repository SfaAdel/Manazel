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
            $techniciansQuery->whereJsonContains('provider_availabilities.off_days', $today);
        } elseif ($offDayFilter === 'off') {
            $techniciansQuery->where(function ($query) use ($today) {
                $query->whereJsonDoesntContain('provider_availabilities.off_days', $today)
                      ->orWhereNull('provider_availabilities.off_days');
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

return view('admin.index', compact('profits', 'profitPeriod','callClicks', 'whatsappClicks', 'period','technicians', 'requests', 'profits', 'callClicks', 'whatsappClicks', 'serviceStats', 'day', 'subServiceId', 'offDayFilter', 'subCategories', 'subCategoryId'));
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
    $query = Appointment::join('sub_services', 'appointments.sub_service_id', '=', 'sub_services.id')
        ->select(
            DB::raw('count(appointments.id) as number_of_orders'),
            DB::raw('sum(sub_services.price) as total_profits')
        );

    if ($period == 'today') {
        $query->whereDate('appointments.created_at', today());
    } elseif ($period == 'month') {
        $query->whereMonth('appointments.created_at', today()->month);
    } elseif ($period == 'year') {
        $query->whereYear('appointments.created_at', today()->year);
    }

    return $query->first();
}

}
