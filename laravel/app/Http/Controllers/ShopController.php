<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function getAllProducts()  {

        $allProducts = ProductModel::orderBy('id', 'desc')->get();


        return view("shop", compact('allProducts'));
    }


}
