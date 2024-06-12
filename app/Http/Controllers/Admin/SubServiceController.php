<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubServiceRequest;
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
        $categories = Category::all(['id', 'name']);
        $services = Service::all(['id', 'name', 'category_id']);

        return view('admin.sub_services.create', compact('categories', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubServiceRequest $request)
    {
        //
        $ImageName = null;

        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/sub_services'), $ImageName);
        }

        SubService::create($request->except('icon', '_token') +
            ['icon' => $ImageName]);


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
    public function update(SubServiceRequest $request, SubService $subService)
    {
        //
        $subService->update($request->except('icon', '_token', '_method'));
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/sub_services'), $ImageName);
            $subService->update(['icon' => $ImageName]);
        }
        return redirect()->route('admin.sub_services.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubService $subService)
    {
        //
        $subService->delete();
        return redirect()->route('admin.sub_services.index')->with('delete', 'تم حذف البيانات بنجاح');
    }

    public function getServicesByCategory($categoryId)
    {
        $services = Service::where('category_id', $categoryId)->get(['id', 'name']);
        return response()->json($services);
    }

}
