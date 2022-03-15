<?php

namespace App\Http\Controllers;

use App\Models\Items;

class HomeController extends Controller
{
    public function index()
    {
        $items = Items::orderBy('updated_at', 'desc')->get();
        $items = Items::getOnPage(1, 6, $items);

        return view('index', ['items' => $items]);

    }
}

