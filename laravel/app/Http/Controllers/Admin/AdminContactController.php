<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{



    public function getAllContacts()  {

        $allContacts = ContactModel::orderBy('id', 'desc')->get();


        return view("admin/allContacts", compact('allContacts'));
    }


    public function sendContact(Request $request) {

        $request->validate([

            "email" => "required|string" ,
            // if(isset($_POST['email']) && is_string($_POST['email']))

            "subject" => "required|string",
            "message" => "required|string|min:5"

        ]);

        // echo "Email: ".$request->get('email')." Naslov: ".$request->get("subject")." Poruka: ".$request->get("message");

        ContactModel::create([
            "email" => $request->get("email"),
            "subject" => $request->get("subject"),
            "message" => $request->get("message")
        ]);

        return redirect("admin/allContacts");

    }


}
