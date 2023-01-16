<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with(['category'])
            ->paginate(10)
            ->through(fn ($menu) => [
                'id' => $menu->id,
                'category' => $menu->category->name,
                'name' => $menu->name,
                'description' => $menu->description,
                'price' => $menu->price,
                'photo' => public_path($menu->photo),
                'active' => $menu->active,
            ]);

        return Inertia::render('Admin/Menus/Index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Admin/Menus/Create', compact('categories'));
    }


    public function store(MenuRequest $request)
    {
        Menu::create([
            ...$request->except('photo'),
            'photo' => $request->file('photo')->store('menu', ['disk' => 'public'])
        ]);

        return Redirect::route('admin.menus.index')->with('success', 'Added dish to menu.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return Inertia::render('Admin/Menus/Edit', ['menu' => $menu, 'categories' => $categories]);
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $menu->update($request->validated());

        return Redirect::route('admin.menus.index')->with('success', 'Menu updated.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return Redirect::back()->with('success', 'Menu deleted.');
    }
}
