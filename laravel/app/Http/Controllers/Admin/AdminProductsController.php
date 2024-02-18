<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    public function allProducts() {

        $allProducts = ProductModel::orderBy('id', 'desc')->get();

        return view("admin/allProducts", compact('allProducts'));
    }

    public function createNewProduct(Request $request) {

        $request->validate([

            "name" => "required|unique:products|string",
            "amount" => "required|integer|min:1",
            "price" => "required|integer|min:1",
            "description" => "required|string|min:5",
            "image" => "required",

        ]);

        // echo "name: ".$request->get('name')." description: ".$request->get("description")." amount: ".$request->get("amount")."price: ".$request->get("price");

        ProductModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
            "image" => $request->get("image"),

        ]);

        return redirect()->route("sviProizvodi");
    }

    public function deleteProduct($product) {

        $singleProduct = ProductModel::where(['id' => $product])->first();

        if($singleProduct === null) {
            die("Ovaj proizvod ne postoji");
        }

        $singleProduct->delete();

        return redirect()->back();
    }


    public function editProduct($product) {
        $singleProduct = ProductModel::findOrFail($product);

        return view('admin.editProduct', compact('singleProduct'));
    }


    public function updateProduct(Request $request, $product) {

        $singleProduct = ProductModel::findOrFail($product);

        $request->validate([
            "name" => "required|string",
            "amount" => "required|integer|min:1",
            "price" => "required|integer|min:1",
            "description" => "required|string|min:5",
            "image" => "required",
        ]);

        $singleProduct->name = $request->get('name');
        $singleProduct->amount = $request->get('amount');
        $singleProduct->price = $request->get('price');
        $singleProduct->description = $request->get('description');
        $singleProduct->image = $request->get('image');

        $singleProduct->save();

        return redirect()->route("sviProizvodi");
    }


}
