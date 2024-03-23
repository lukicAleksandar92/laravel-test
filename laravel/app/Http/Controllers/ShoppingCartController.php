<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if($cart < 1) {
            return redirect('/');
        };


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




    public function finishOrder ()
    {

        $cart = Session::get('product');

        foreach($cart as $cartItem) {

            $product = ProductModel::where('id', $cartItem['id'] )->first();

            if($cartItem['quantity'] > $product->amount) {
                return redirect()->back()->with('error', 'Selected quantity exceeds available amount.');
            }
        }


        $productIds = collect($cart)->pluck('id')->toArray();
        $products = ProductModel::whereIn('id', $productIds)->get();

        $totalPrice = $this->calculateTotalPrice($cart, $products);

        $order = Orders::create([
            "user_id" => Auth::id(),
            "price" => $totalPrice
        ]);


        foreach($cart as $cartItem) {

            $product = ProductModel::where('id', $cartItem['id'] )->first();
            $product->amount -= $cartItem['quantity'];
            $product->save();

            OrderItems::create([
                "order_id" => $order->id,
                "product_id" => $product->id,
                "quantity" => $cartItem['quantity'],
                "price" => $cartItem['quantity'] * $product->price
            ]);

        };

        Session::remove('product');

        return redirect('cart/thankyou');


    }





}
