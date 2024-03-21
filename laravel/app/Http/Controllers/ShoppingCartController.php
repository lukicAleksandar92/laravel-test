<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{


    public function index()
    {

        return view("cart", [
            'cart' => Session::get('product')
        ]);

    }


    public function addToCart (Request $request)
    {

        Session::put('product', [
            $request->id => $request->quantity,
        ]);

        return redirect()->route("cart.index");


    }












}
