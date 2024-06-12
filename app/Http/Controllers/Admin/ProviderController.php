<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProviderRequest;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $providers = Provider::latest()->paginate(10);

        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all(['id', 'name']);

        return view('admin.providers.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProviderRequest $request)
    {
        //

        Provider::create($request->except('_token'));

        return redirect()->route('admin.providers.index')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProviderRequest $provider)
    {
        //
        $categories = Category::all(['id', 'name']);

        return view('admin.providers.edit', compact('provider','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProviderRequest $request, Provider $provider)
    {
        //
        $provider->update($request->except('_token', '_method'));

        return redirect()->route('admin.providers.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        //
        $provider->delete();
        return redirect()->route('admin.providers.index')->with('delete', 'تم حذف البيانات بنجاح');
    }
}
