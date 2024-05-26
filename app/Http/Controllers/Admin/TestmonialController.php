<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testmonial;
use Illuminate\Http\Request;

class TestmonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');
        $testmonials = Testmonial::orderBy('created_at', 'desc');

        if ($search) {
            $testmonials = $testmonials
                ->whereAny(['name'], 'like', '%' . request()->get('search', '') . '%');
        }

         confirmDelete('حذف المراجعة!', "هل انت متأكد من حذف هذه المراجعة؟");

        return view('admin.testmonials.index', [
            'testmonials' => $testmonials->paginate(12),
            'search' => $search,
        ]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Testmonial $testmonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testmonial $testmonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testmonial $testmonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testmonial $testmonial)
    {
        //
    }
}
