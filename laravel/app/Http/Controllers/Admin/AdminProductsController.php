<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    public function addProduct()
    {

        return view("admin/addProduct");
    }

    public function allProducts()
    {

        $allProducts = ProductModel::orderBy('id', 'desc')->get();

        return view("admin/allProducts", compact('allProducts'));
    }

    public function createNewProduct(Request $request)
    {

        $request->validate([

            "name" => "required|string",
            "amount" => "required|integer|min:1",
            "price" => "required|integer|min:1",
            "description" => "required|string|min:5"

        ]);

        // echo "name: ".$request->get('name')." description: ".$request->get("description")." amount: ".$request->get("amount")."price: ".$request->get("price");

        ProductModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price")

        ]);

        return redirect("/admin/all-products");
    }

    public function delete($product) {

        $singleProduct = ProductModel::where(['id' => $product])->first();

        if($singleProduct === null) {
            die("Ovaj proizvod ne postoji");
        }

        $singleProduct->delete();

        return redirect()->back();


    }




}
