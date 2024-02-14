<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModel;

class ContactController extends Controller
{
    public function index()  {

        return view("contact");

    }


    public function getAllContacts()  {

        $allContacts = ContactModel::all();


        return view("allContacts", compact('allContacts'));
    }




}
