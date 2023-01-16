<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menu = Menu::when(
            $request->has('category_id'),
            fn ($query) => $query->where('category_id', $request->category_id)
        )->get();

        return $menu;
    }
}
