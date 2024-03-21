<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{

    public function getAllProducts()  {

        $allProducts = ProductModel::orderBy('id', 'desc')->get();

        return view("shop", compact('allProducts'));
    }




    public function showSingleProduct(ProductModel $product)  {

        return view("permalink", compact('product'));
    }






}
