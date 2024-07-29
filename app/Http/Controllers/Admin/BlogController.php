<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Title;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all(['id', 'name']);
        $tags = Tag::all(['id', 'name']);

        return view('admin.blogs.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        //
        $ImageName = null;

        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/blogs'), $ImageName);
        }
        if ($request->hasFile('banner')) {
            $BannerImageName = time() . '.' . $request->banner->extension();
            $request->banner->move(('images/blogs_banners/'), $BannerImageName);
        }

        $blog = Blog::create($request->except('icon', '_token','tags') +
            ['icon' => $ImageName]+
            ['banner' => $BannerImageName]);

        $blog->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.blogs.index')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
        return view('admin.blogs.show', compact('blog'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        $categories = Category::all(['id', 'name']);
        $tags = Tag::all(['id', 'name']);

        return view('admin.blogs.edit', compact('blog','categories','tags'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        //
        $blog->update($request->except('icon', '_token', '_method','tags'));
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/blogs'), $ImageName);
            $blog->update(['icon' => $ImageName]);
        }
        if ($request->hasFile('banner')) {
            $BannerImageName = time() . '.' . $request->banner->extension();
            $request->banner->move(('images/blogs_banners/'), $BannerImageName);
            $blog->update(['banner' => $BannerImageName]);
        }

        $blog->tags()->sync($request->input('tags', []));


        return redirect()->route('admin.blogs.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('delete', 'تم حذف البيانات بنجاح');
    }


    public function filterByTag($tagId)
    {
        $categories = Category::all();
        $blogSection = Title::where('section', 'blogs')->first();
        $navCategories = Category::latest()->get();
        $setting = Setting::first();
        $tags = Tag::all();

        $blogs = Blog::whereHas('tags', function ($query) use ($tagId) {
            $query->where('tag_id', $tagId);
        })->get();

        $noBlogsMessage = $blogs->isEmpty() ? 'لا يوجد مدونات في هذه الفئة' : '';

        return view('front.blogs', compact('setting', 'blogs', 'categories', 'blogSection', 'navCategories', 'tags', 'noBlogsMessage'));
    }
}



