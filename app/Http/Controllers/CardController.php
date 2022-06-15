<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Option;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index($id, Request $request)
    {
        // Для рендера
        $item = Item::find($id);
        $offer = Item::query()->where('id', '>', $id)->limit(3)->get();
        $colors = $item->colors()->get()->unique();
        $sizes = $item->sizes()->get()->unique();
        $quantity = 1;

        $option = Option::query()
            ->where('item_id', $id)->first();

        return view('card', [
            'offer' => $offer,
            'item' => $item,
            'colors' => $colors,
            'sizes' => $sizes,
            'option' => $option,
            'quantity' => $quantity,
            'gender' => $item->gender,
            'trending' => $request->trending
        ]);
    }

    public function getPriceOption(Request $request)
    {
        $option = Option::query()
            ->where('item_id', $request['itemId'])
            ->where('color_id', $request['color'])
            ->where('size_id', $request['size']);

        if ($option) {
            $summ = $option->value('impact_price') * $request['quantity'] . ' $';

            return ['option' => $option->get()->first(), 'price' => $summ];
        }

        return 'Нет в наличии';
    }
}
