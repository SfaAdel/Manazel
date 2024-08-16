<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\CustomerReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function submitReview(Request $request, $subServiceId)
    {
        $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review = new CustomerReview();
        $review->sub_service_id = $subServiceId;
        $review->customer_id = Auth::guard('customer')->id();
        $review->stars = $request->input('stars');
        $review->comment = $request->input('comment');
        $review->save();

        return back()->with('success', 'تم اضافة تقييمك بنجاح.');
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
    public function show(CustomerReview $customerReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerReview $customerReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerReview $customerReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerReview $customerReview)
    {
        //
    }
}
