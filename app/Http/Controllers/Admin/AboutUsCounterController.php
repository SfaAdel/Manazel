<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsCounter;
use Illuminate\Http\Request;

class AboutUsCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $counters = AboutUsCounter::latest()->paginate(10);
        return view('admin.counters.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.counters.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/counters'), $ImageName);
        }

        AboutUsCounter::create($request->except('icon', '_token') +
            ['icon' => $ImageName]);


        return redirect()->route('admin.counters.index')->with('success', 'تم اضافة البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUsCounter $aboutUsCounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUsCounter $counter)
    {
        //
        return view('admin.counters.edit', compact('counter'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutUsCounter $counter)
    {
        //
        $counter->update($request->except('icon', '_token', '_method'));
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/counters'), $ImageName);
            $counter->update(['icon' => $ImageName]);
        }
        return redirect()->route('admin.counters.index')->with('success', 'تم تعديل البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUsCounter $aboutUsCounter)
    {
        //
        $aboutUsCounter->delete();
        return redirect()->route('admin.counters.index')->with('delete', 'تم حذف البيانات بنجاح');

    }
}
