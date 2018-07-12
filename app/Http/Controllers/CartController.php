<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Courier;

class CartController extends Controller
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
        $cart = $request->session()->get('cart.items');
        $items = array();
        $overall = 0;

        if($request->session()->has('cart.items'))
        foreach ($cart as $key => $value) {
            $item = Item::find($value['item_id']);
            $total = $item->price * (float) $value['quantity'];

            $value['item'] = $item;
            $value['total'] = number_format($total, 2, '.', ',');

            $overall += $total;

            array_push($items, $value);
        }

        $data = array(
            'cart' => $items, 
            'overall' => number_format($overall, 2, '.', ','),
            'couriers' => Courier::all()
        );

        return view('pages.cart')->with($data);
    }

    public function cart(Request $request, $option = null) {
        if($option === 'add') {
            $data = array(
                'item_id' => $request->item_id,
                'quantity' => $request->quantity,
                'size' => $request->size
            );

            $updateCart = array();
    
            if($request->session()->has('cart')) {
                $current_items = $request->session()->get('cart');
    
                foreach ($current_items['items'] as $key => $value) {
                    if($value['item_id'] == $data['item_id'] && $value['size'] == $data['size']){
                        $value['quantity'] += (int) $data['quantity'];
    
                        array_push($updateCart, $value);
                    } else {
                        array_push($updateCart, $value);
    
                        if(sizeof($current_items['items'])-1 == $key){
                            array_push($updateCart, $data);
                        }
                    }
                }
    
                $request->session()->put('cart.items', $updateCart);
                
                echo json_encode($request->session()->get('cart'));
            } else {
                $request->session()->push('cart.items', $data);

                if($request->session()->has('cart.items')){
                    $cart = $request->session()->get('cart.items');
                    $items = array();
        
                    foreach ($cart as $key => $value) {
                        $item = Item::find($value['item_id']);
                        $total = $item->price * (float) $value['quantity'];
        
                        $value['item'] = $item;
                        $value['total'] = number_format($total, 2, '.', ',');
        
                        array_push($items, $value);
                    }
        
                    $data = array(
                        'items' => $items, 
                    );
        
                    echo json_encode($data);
                } else echo json_encode(null);
            }
        }
    }

    public function get(Request $request) {
        if($request->session()->has('cart')) {
            $cart = $request->session()->get('cart.items');
            $items = array();

            foreach ($cart as $key => $value) {
                $item = Item::find($value['item_id']);
                $total = $item->price * (float) $value['quantity'];

                $value['item'] = $item;
                $value['total'] = number_format($total, 2, '.', ',');

                array_push($items, $value);
            }

            $data = array(
                'items' => $items, 
            );

            echo json_encode($data);
        } else {
            echo json_encode(null);
        }
    }

    public function courier(Request $request) {
        $courier_id = $request->id;
        $overall = 0;
        $courier = Courier::find($courier_id);

        if($request->session()->has('cart.items')){
            $cart = $request->session()->get('cart.items');
    
            foreach ($cart as $key => $value) {
                $item = Item::find($value['item_id']);
                $total = $item->price * (float) $value['quantity'];
    
                $overall += $total;
            }
        }

        $courier['withshippingfee'] = number_format($overall+$courier->fee, 2, '.', ',');

        echo json_encode($courier);
    }

    public function checkout() {
        
    }
}
