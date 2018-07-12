<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Category;
use App\SubCategory;
use App\Courier;
use App\ItemCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('subcategory.item_categories.item', 'item_categories')->get();
        $items = Item::all();
        $brands = Brand::with('products')->get();

        $data = array(
            'items' => $items, 
            'categories' => $categories,
            'brands' => $brands
        );

        return view('pages.home')->with($data);;
    }
}
