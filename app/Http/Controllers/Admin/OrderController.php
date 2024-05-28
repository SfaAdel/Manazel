<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Provider;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $search = request()->input('search');
        $orders = Order::latest();

        if ($search) {
            $orders->where(function ($query) use ($search) {
                $query->where('order_date', 'like', '%' . $search . '%')
                      ->orWhereHas('customer', function ($query) use ($search) {
                          $query->where('name', 'like', '%' . $search . '%');
                      });
            });
        }

        $orders = $orders->paginate(10);
        return view('admin.orders.index', compact('orders','search'));


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
    public function show(Order $order)
    {
        //
        $appointments = $order->appointments; // Assuming the relationship is defined in the Order model
        $providers = Provider::all(); // Fetch all providers to allow selection
        return view('admin.orders.show', compact('order', 'appointments', 'providers'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //

        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
        $status = $request->input('status');

    if ($status === 'canceled') {
        // Delete related appointments if the order is canceled
        $order->appointments()->delete();
    }

    // Update the order status
    $order->update(['status' => $status]);

    return redirect()->route('admin.orders.index')->with('success', 'تم تحديث حالة الطلب بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
