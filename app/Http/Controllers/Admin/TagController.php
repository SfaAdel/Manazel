<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $search = request()->input('search');

        // Apply the search condition before pagination
        $query = Tag::query();

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }

        $tags = $query->latest()->paginate(10);

        return view('admin.tags.index', compact('tags','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tags.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        //
        Tag::create($request->except('_token'));

        return redirect()->route('admin.tags.index')->with('success', 'تم اضافة البيانات بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
        return view('admin.tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        //
        $tag->update($request->except('_token', '_method'));

        return redirect()->route('admin.tags.index')->with('success', 'تم تعديل البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('delete', 'تم حذف البيانات بنجاح');
   }
}
