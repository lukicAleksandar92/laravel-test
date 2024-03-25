<?php

namespace App\Http\Controllers;


use App\Repositories\ShoppingCartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{

    private $shoppingCartRepository;

    public function __construct(ShoppingCartRepository $shoppingCartRepository)
    {
        $this->shoppingCartRepository = $shoppingCartRepository;
    }


    public function index()
    {
        $cartDetails = $this->shoppingCartRepository->getCartDetails();

        return view("cart", $cartDetails);
    }




    public function addToCart(Request $request)
    {
        $cart = Session::get('product', []);
        $cart = $this->shoppingCartRepository->addToCart(
            $cart,
            $request->input('id'),
            $request->input('quantity')
        );

        if (isset($cart['error'])) {
            return redirect()->back()->with('error', $cart['error']);
        }

        Session::put('product', $cart);
        return redirect()->route('cart.index');
    }




    public function finishOrder()
    {
        return $this->shoppingCartRepository->finishOrder();
    }





}
