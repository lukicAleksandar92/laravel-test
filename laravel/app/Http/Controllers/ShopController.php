<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {

        $products = [
            "BMW F30", "BMW G20", "Mercedes GLE", "Audi A6", "Volvo XC90"
        ];


        return view("shop", compact('products'));
    }
}
