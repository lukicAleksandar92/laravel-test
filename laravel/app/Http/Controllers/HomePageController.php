<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomePageController extends Controller
{
    public function index() {

        $sat = date('H');
        // dd($sat);

        $trenutnoVreme = date('H:i:s');

        return view("welcome", compact('trenutnoVreme', 'sat'));

    }

}
