<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $whyUsQuestions = WhyUs::latest()->paginate(10);
        return view('admin.why_us.index', compact('whyUsQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.why_us.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        WhyUs::create($request->except( '_token'));

        return redirect()->route('admin.why_us.index')->with('success', 'تم اضافة البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(WhyUs $whyUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyUs $whyUs)
    {
        //
        return view('admin.why_us.edit', compact('whyUs'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyUs $whyUs)
    {
        //
        $whyUs->update($request->except('_token', '_method'));

        return redirect()->route('admin.why_us.index')->with('success', 'تم تعديل البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyUs $whyUs)
    {
        //
        $whyUs->delete();
        return redirect()->route('admin.why_us.index')->with('delete', 'تم حذف البيانات بنجاح');
    }
}
