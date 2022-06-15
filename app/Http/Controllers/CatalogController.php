<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $trending = (bool)$request->trending;
        $gender = $request->gender ? : null;
        $category = $request->category ? array($request->category) : null;

        return view('catalog', [
            'items' => Item::getItems($category, $gender, $trending)->paginate(3),
            'categories' => Category::all(),
            'gender' => $gender,
            'categoryId' => $request->category ? : null,
            'trending' => $trending,
        ]);
    }

    public function categoryFilter(Request $request)
    {
        if ($request->ajax()) {
            $ch_categories = $request['categories'] ?: null;
            $gender = $request['gender'] ? str_replace(['/', ' '], '', strtolower($request['gender'])) : null;

            return view('blocks.items', [
                'items' => Item::getItems($ch_categories, $gender, true)->paginate(3),
                'categories' => Category::all(),
            ]);
        }
    }

}
