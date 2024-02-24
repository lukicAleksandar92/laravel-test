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


    public function editProduct(Request $request, ProductModel $product) {
        return view('admin.editProduct', compact('product'));
    }


    public function updateProduct(Request $request, ProductModel $product) {

        // $singleProduct = ProductModel::findOrFail($product);

        // $request->validate([
        //     "name" => "required|string",
        //     "amount" => "required|integer|min:1",
        //     "price" => "required|integer|min:1",
        //     "description" => "required|string|min:5",
        //     "image" => "required",
        // ]);

        $product->name = $request->get('name');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->image = $request->get('image');
        $product->save();

        return redirect()->route("sviProizvodi");
    }


}
