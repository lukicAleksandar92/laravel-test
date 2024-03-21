<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    public function index() {

        $sat = date('H');
        // dd($sat);

        $trenutnoVreme = date('H:i:s');

        $newestSixProducts = ProductModel::orderBy('id', 'desc')->take(6)->get();



        return view("welcome", compact('trenutnoVreme', 'sat', 'newestSixProducts'));



    }

}
