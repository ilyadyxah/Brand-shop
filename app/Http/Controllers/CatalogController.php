<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request, $page = 1)
    {
        $trending = (bool)$request->trending;
        $gender = $request->gender ? : null;
        $category = $request->category ? array($request->category) : null;
        $items = Items::getItems($category, $gender, $trending);
        $pages = Items::getPages(6, $items);
        $items = Items::getOnPage($page, 6, $items);
        $categories = Category::all();
        $category = $request->category ? : null;
        return view('catalog', [
            'items' => $items,
            'pages' => $pages,
            'current_page' => $page,
            'categories' => $categories,
            'gender' => $gender,
            'categoryId' => $category,
            'trending' => $trending,
        ]);
    }

    public function categoryFilter(Request $request)
    {
        if ($request->ajax()) {
            $ch_categories = $request['categories'] ?: null;
            $gender = $request['gender'] ? str_replace(['/', ' '], '', strtolower($request['gender'])) : null;
            $items = Items::getItems($ch_categories, $gender, true);
            $page = $request['page'] ?: 1;
            $categories = Category::all();
            $pages = Items::getPages(6, $items);
            $items = Items::getOnPage($page, 6, $items);
            return view('blocks.items', [
                'items' => $items,
                'pages' => $pages,
                'current_page' => $page,
                'categories' => $categories,
            ]);
        }
    }
}
