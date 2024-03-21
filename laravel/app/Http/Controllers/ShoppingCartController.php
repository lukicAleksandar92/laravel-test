<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{

    private function calculateTotalPrice($cart, $products)
    {
        $totalPrice = 0;

        foreach ($cart as $cartItem) {
            $product = $products->where('id', $cartItem['id'])->first();
            $totalPrice += $cartItem['quantity'] * $product->price;
        }

        return $totalPrice;
    }




    public function index()
    {
        $cart = Session::get('product');

        $productIds = collect($cart)->pluck('id')->toArray();
        $products = ProductModel::whereIn('id', $productIds)->get();

        $totalPrice = $this->calculateTotalPrice($cart, $products);

        return view("cart", compact('cart', 'products', 'totalPrice'));
    }




    public function addToCart(Request $request)
    {

        $product = ProductModel::find($request->id);
        $cart = Session::get('product');

        $existingCartItem = collect($cart)->firstWhere('id', $request->id);

        $totalQuantity = $existingCartItem ?
        $existingCartItem['quantity'] + $request->quantity : $request->quantity;


        if ($totalQuantity > $product->amount) {
            return redirect()->back()->with('error', 'Selected quantity exceeds available amount.');
        }


        if ($existingCartItem) {

            $existingCartItem['quantity'] = $totalQuantity;

        } else {

            $cart[] = [
                'id' => $request->id,
                'quantity' => $request->quantity,
            ];
        }


        Session::put('product', $cart);

        return redirect()->route("cart.index");
    }











}
