<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subServices = SubService::latest()->paginate(10);

        return view('admin.sub_services.index', compact('subServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all(['id', 'name']);
        $services = Service::all(['id', 'name']);

        return view('admin.sub_services.create', compact('categories','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        SubService::create($request->except('_token'));

        return redirect()->route('admin.sub_services.index')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubService $subService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubService $subService)
    {
        //
        $categories = Category::all(['id', 'name']);
        $services = Service::all(['id', 'name']);

        return view('admin.sub_services.edit', compact('subService','categories','services'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubService $subService)
    {
        //
        $subService->update($request->except('_method', '_token'));
        return redirect()->route('admin.sub_services.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubService $subService)
    {
        //
    }
}
