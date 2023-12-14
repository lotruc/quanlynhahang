<?php

namespace App\Http\Controllers\Website;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Product::all();
        $category = Category::all();
        return view('website.menu.index', ['menu' => $menu, 'category' => $category]);
    }
}
