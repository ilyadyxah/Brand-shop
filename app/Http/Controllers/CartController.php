<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $items = $request->session()->get('orders') ?: [];
        return view('cart', ['items' => $items]);
    }

    public function addItem(int $id, int $quantity, Request $request)
    {
        $option = Option::find($id);
        if (!$request->session()->has("orders.$id")) {
            $request->session()->push("orders.$id", [
                'user_id' => 1,
                'option_id' => $option->id,
                'item_id' => $option->item_id,
                'color_id' => $option->color_id,
                'size_id' => $option->size_id,
                'price' => $option->impact_price,
                'quantity' => $quantity,
            ]);
        } else {
            $request->session()->put("orders.$id.0.quantity", session()->get("orders.$id.0.quantity") + 1);
        }
        return redirect()->back();
    }

    public function deleteItem(int $id, Request $request)
    {
        $request->session()->forget("orders.$id");
        return redirect()->back();
    }

    public function clear(Request $request)
    {
        $request->session()->forget('orders');
        return redirect()->back();
    }
}

//        $order = Cart::query()->where('option_id', $id)->first() ? : new Cart;
//        $option = Option::find($id);
//
//        $order->user_id = 1;
//        $order->option_id = $id;
//        $order->item_id = $option->item_id;
//        $order->color_id = $option->color_id;
//        $order->size_id = $option->size_id;
//        $order->price = $option->impact_price;
//        $order->quantity += $quantity;
//        $order->save();
//        dd($request->session()->all());
