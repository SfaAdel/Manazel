<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DistrictRequest;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $districts = District::latest()->paginate(10);

        return view('admin.districts.index', compact('districts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $cities = City::latest();
        $cities = City::all(['id', 'name']);

        return view('admin.districts.create', compact('cities'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DistrictRequest $request)
    {
        //
        District::create($request->except('_token'));

        return redirect()->route('admin.districts.index')->with('success', 'تم اضافة البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        //
        $cities = City::all(['id', 'name']);

        return view('admin.districts.edit', compact('district','cities'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DistrictRequest $request, District $district)
    {
        //
        $district->update($request->except('_token', '_method'));

        return redirect()->route('admin.districts.index')->with('success', 'تم تعديل البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //
        $district->delete();
        return redirect()->route('admin.districts.index')->with('delete', 'تم حذف البيانات بنجاح');
    }
}
