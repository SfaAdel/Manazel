<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $advantages = Advantage::latest()->paginate(10);
        return view('admin.advantages.index', compact('advantages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.advantages.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/advantages'), $ImageName);
        }

        Advantage::create($request->except('icon', '_token') +
            ['icon' => $ImageName]);


        return redirect()->route('admin.advantages.index')->with('success', 'تم اضافة البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(Advantage $advantage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advantage $advantage)
    {
        //
        return view('admin.advantages.edit', compact('advantage'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advantage $advantage)
    {
        //
        $advantage->update($request->except('icon', '_token', '_method'));
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/advantages'), $ImageName);
            $advantage->update(['icon' => $ImageName]);
        }
        return redirect()->route('admin.advantages.index')->with('success', 'تم تعديل البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advantage $advantage)
    {
        //
        $advantage->delete();
        return redirect()->route('admin.advantages.index')->with('delete', 'تم حذف البيانات بنجاح');

    }
}
