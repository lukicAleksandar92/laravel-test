<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;

class AdminContactController extends Controller
{

    private $contactRepo;

    public function __construct()
    {

        $this->contactRepo = new ContactRepository;

    }


    public function getAllContacts()  {

        $allContacts = ContactModel::orderBy('id', 'desc')->get();


        return view("admin/allContacts", compact('allContacts'));
    }



    public function sendContact(SendContactRequest $request) {

        $this->contactRepo->sendNewContact($request);

        return redirect("/contact")->with('success', 'Contact successfully sent. We will reply as soon as possible.');;

    }




    public function deleteContact(ContactModel $contact) {

        $contact->delete();

        return redirect()->back();


    }




    public function editContact(ContactModel $contact)
    {
        return view('admin.editContact', compact('contact'));
    }





    public function updateContact(UpdateContactRequest $request, ContactModel $contact) {

        $this->contactRepo->update($contact, $request);

        return redirect()->route("sviKontakti");
    }




}
