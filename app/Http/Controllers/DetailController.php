<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class DetailController extends Controller
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
    public function index(Request $request)
    {
        $item = Item::where('id', $request->id)->with('images')->get();

        return view('pages.detail')->with('item', $item);
    }
}
