<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\ItemCategory;

class ItemController extends Controller
{
    public function item(Request $request, $option = null) {
        $id = $request->id;
        $item = null;

        if($id && $option === 'category') {
            $item = ItemCategory::where('category_id', $id)->with('item.images')->get();
        } else if($id && $option === 'subcategory') {
            $item = ItemCategory::where('sub_category_id', $id)->with('item.images')->get();
        } else if($id === null && $option === null) {
            $item = Item::with('brand', 'seller', 'images')->get();
        }

        echo json_encode($item);
    }
}
