<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest()->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/categories'), $ImageName);
        }
        if ($request->hasFile('bannar')) {
            $BannarImageName = time() . '.' . $request->bannar->extension();
            $request->bannar->move(('images/categories_bannars/'), $BannarImageName);
        }
        if ($request->hasFile('logo')) {
            $LogoImageName = time() . '.' . $request->logo->extension();
            $request->logo->move(('images/categories/'), $LogoImageName);
        }
        Category::create($request->except('icon','bannar','logo', '_token') +
            ['icon' => $ImageName]+
            ['bannar' => $BannarImageName]+
            ['logo' => $LogoImageName]);

        return redirect()->route('admin.categories.index')->with('success', 'تم اضافة البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
        $category->update($request->except('icon','bannar','logo', '_token', '_method'));
        if ($request->hasFile('icon')) {
            $ImageName = time() . '.' . $request->icon->extension();
            $request->icon->move(('images/categories'), $ImageName);
            $category->update(['icon' => $ImageName]);
        }
        if ($request->hasFile('bannar')) {
            $BannarImageName = time() . '.' . $request->bannar->extension();
            $request->bannar->move(('images/categories_bannars/'), $BannarImageName);
            $category->update(['bannar' => $BannarImageName]);
        }
        if ($request->hasFile('logo')) {
            $LogoImageName = time() . '.' . $request->logo->extension();
            $request->logo->move(('images/categories'), $LogoImageName);
            $category->update(['logo' => $LogoImageName]);
        }

        return redirect()->route('admin.categories.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('admin.categories.index')->with('delete', 'تم حذف البيانات بنجاح');
    }
}
