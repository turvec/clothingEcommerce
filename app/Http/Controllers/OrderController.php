<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function place(Request $request)
    {
        $product = Product::find($request->product_id);
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->address = $request->address;
        $order->price = $product->price;
        $order->user_id = Auth::user()->id;
        $order->save();
        return back();
    }
    //
}
