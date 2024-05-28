<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $testimonials = Testimonial::latest()->paginate(10);

        //  confirmDelete('حذف المراجعة!', "هل انت متأكد من حذف هذه المراجعة؟");

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/testimonials'), $ImageName);
        }

        Testimonial::create($request->except('icon', '_token') +
            ['icon' => $ImageName]);


        return redirect()->route('admin.testimonials.index')->with('success', 'تم اضافة البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
        return view('admin.testimonials.edit', compact('testimonial'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
        $testimonial->update($request->except('icon', '_token', '_method'));
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/testimonials'), $ImageName);
            $testimonial->update(['icon' => $ImageName]);
        }
        return redirect()->route('admin.testimonials.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
