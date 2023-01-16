<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10)
            ->through(fn ($category) => [
                'id' => $category->id,
                'name' => $category->name,
            ]);

        return Inertia::render('Admin/Category/Index', compact('category'));
    }

    public function create()
    {
        return Inertia::render('Admin/Category/Create');
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return Redirect::route('admin.categories.index')->with('success', 'Added new category');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return Inertia::render('Admin/Category/Edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return Redirect::back()->with('success', 'category updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::back()->with('success', 'Category deleted.');
    }
}
