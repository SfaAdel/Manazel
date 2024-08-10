<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralRequest;
use App\Models\Category;
use Illuminate\Http\Request;
class GeneralRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');

        // Initialize the query
        $generalRequests = GeneralRequest::latest();

        // Apply search filter if provided
        if ($search) {
            $generalRequests->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        // Paginate the results
        $generalRequests = $generalRequests->paginate(10);

        // Return the view with data
        return view('admin.general_requests.index', compact('generalRequests', 'search'));
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
        GeneralRequest::create($request->except('_token'));
        return redirect()->back()->with('success', 'تم طلب الخدمة بنجاح!');

    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralRequest $generalRequest)
    {
        //
        return view('admin.general_requests.show', compact('generalRequest'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralRequest $generalRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralRequest $generalRequest)
    {
        //
        $request->validate([
            'status' => 'required|in:canceled,pending,completed',
            'price' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $generalRequest->status = $request->status;
        $generalRequest->notes = $request->notes;

        if ($request->status === 'completed') {
            $generalRequest->price = $request->price ?? $generalRequest->subService->final_price;
        } else {
            $generalRequest->price = 0;
        }

        $generalRequest->save();

        return redirect()->route('admin.general_requests.show', $generalRequest->id)->with('success', 'تم تحديث حالة الطلب بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralRequest $generalRequest)
    {
        //
        $generalRequest->delete();

        return redirect()->route('admin.general_requests.index')->with('success', 'تم الحذف بنجاح');
    }
}
