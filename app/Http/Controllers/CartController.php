<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Item;
use App\Models\Option;
use App\Models\Size;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $items = [];
        if ($orders = $request->session()->get('orders')) {
            foreach ($orders as $order) {
                $optionId = $order[0]['option_id'];
                $option = Option::find($optionId);
                $items[] = [
                    'item' => Item::find($order[0]['item_id']),
                    'optionId' => $optionId,
                    'color' => Color::find($option->color_id),
                    'size' => Size::find($option->size_id),
                    'price' => $option->impact_price,
                    'quantity' => $order[0]['quantity']
                ];
            }
        };

        return view('cart', ['orders' => $items]);
    }

    public function addItem(Request $request)
    {
        $optionId = $request->optionId;
        $option = Option::find($optionId);

        if (!$request->session()->has("orders.$optionId")) {
            $request->session()->push("orders.$optionId", [
                'option_id' => $optionId,
                'item_id' => $option->item_id,
                'quantity' => $request->quantity,
            ]);

        } else {
            $request->session()->put(
                "orders.$optionId.0.quantity",
                $request->session()->get("orders.$optionId.0.quantity") + 1
            );
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
