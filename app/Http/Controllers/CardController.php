<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Option;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index($id, Request $request)
    {
        // Для рендера
        $items = Items::orderBy('updated_at', 'desc')->get();
        $offer = Items::getOnPage(2, 3, $items);
        $item = Items::getItemById($id);
        $colors = Option::query()->where('item_id', $id)->groupBy('color_id')->pluck('color_id');
        $sizes = Option::query()->where('item_id', $id)->groupBy('size_id')->pluck('size_id');

        if (!$request->isMethod('post')) {
            $option = Option::query()
                ->where('item_id', $id)->first();
            $subOptions = [
                'id' => $option->id,
                'color' => $option->color_id,
                'size' => $option->size_id,
                'price' => $option->impact_price,
                'quantity' => 1
            ];
        } else {
            $option = Option::query()
                ->select(['id', 'impact_price'])
                ->where('item_id', $id)
                ->where('color_id', $request->post('color'))
                ->where('size_id', $request->post('size'))
                ->first();
            $subOptions = [
                'id' => $option->id,
                'color' => $request->post('color'),
                'size' => $request->post('size'),
                'price' => $option->impact_price,
                'quantity' => $request->post('quantity'),
            ];
        }
        return view('card', [
            'offer' => $offer,
            'item' => $item,
            'colors' => $colors,
            'sizes' => $sizes,
            'subOptions' => $subOptions,
            'gender' => $item->gender,
            'trending' => $request->trending
        ]);
    }

    public function getPriceOption(Request $request)
    {
        $price = Option::query()
            ->where('item_id', $request['itemId'])
            ->where('color_id', $request['color'])
            ->where('size_id', $request['size'])
            ->value('impact_price');
        return $price * $request['quantity'] .' $';
    }
}
