<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProviderForm;
use Illuminate\Http\Request;

class ProviderFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $providerForms = ProviderForm::latest()->paginate(10);
        return view('admin.provider_form.index', compact('providerForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // If you need to pass categories or other data to the view, retrieve them here
        $categories = Category::all();

        return view('front.provider_form', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        ProviderForm::create($request->except('_token'));
        return redirect()->route('home')->with('success', 'تم استقبال بياناتك بنجاحك ، سنتواصل معك قريبا!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProviderForm $providerForm)
    {
        //
        return view('admin.provider_form.show', compact('providerForm'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProviderForm $providerForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProviderForm $providerForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProviderForm $providerForm)
    {
        //
         $providerForm->delete();

        return redirect()->route('admin.provider_form.index')->with('success', 'تم الحذف بنجاح');
    }
}
