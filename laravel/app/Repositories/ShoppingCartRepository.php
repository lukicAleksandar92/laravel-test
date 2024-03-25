<?php

namespace App\Repositories;

use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartRepository
{

    private $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    public function addToCart(array $cart, int $productId, int $quantity): array
    {
        $product = $this->productModel->find($productId);
        $existingCartItem = collect($cart)->firstWhere('id', $productId);
        $totalQuantity = $existingCartItem ? $existingCartItem['quantity'] + $quantity : $quantity;

        if ($totalQuantity > $product->amount) {
            return ['error' => 'Selected quantity exceeds available amount.'];
        }

        if ($existingCartItem) {
            $existingCartItem['quantity'] = $totalQuantity;
        } else {
            $cart[] = ['id' => $productId, 'quantity' => $quantity];
        }

        return $cart;
    }

    public function finishOrder(): \Illuminate\Http\RedirectResponse
    {
        $cart = Session::get('product');

        foreach ($cart as $cartItem) {
            $product = $this->productModel->find($cartItem['id']);

            if ($cartItem['quantity'] > $product->amount) {
                return redirect()->back()->with('error', 'Selected quantity exceeds available amount.');
            }
        }

        $productIds = collect($cart)->pluck('id')->toArray();
        $products = $this->productModel->whereIn('id', $productIds)->get();

        $totalPrice = $this->calculateTotalPrice($cart, $products);

        $order = Orders::create([
            "user_id" => Auth::id(),
            "price" => $totalPrice
        ]);

        foreach ($cart as $cartItem) {
            $product = $this->productModel->find($cartItem['id']);
            $product->amount -= $cartItem['quantity'];
            $product->save();

            OrderItems::create([
                "order_id" => $order->id,
                "product_id" => $product->id,
                "quantity" => $cartItem['quantity'],
                "price" => $cartItem['quantity'] * $product->price
            ]);
        }

        Session::remove('product');

        return redirect()->route('cart.thankyou');
    }

    private function calculateTotalPrice(array $cart, $products): float
    {
        $totalPrice = 0;

        foreach ($cart as $cartItem) {
            $product = $products->firstWhere('id', $cartItem['id']);
            $totalPrice += $cartItem['quantity'] * $product->price;
        }

        return $totalPrice;
    }




    public function getCartDetails()
    {
        $cart = Session::get('product');

        if (!$cart || count($cart) < 1) {
            return redirect('/');
        }

        $productIds = collect($cart)->pluck('id')->toArray();

        $products = $this->productModel->whereIn('id', $productIds)->get();

        $totalPrice = $this->calculateTotalPrice($cart, $products);

        return compact('cart', 'products', 'totalPrice');
    }


}
