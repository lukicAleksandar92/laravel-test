<?php

namespace App\Repositories;

use App\Models\ContactModel;


class ContactRepository
{

    // DI - Dependency Injection

    private $contactModel;

    public function __construct()
    {

        $this->contactModel = new ContactModel();

    }



    public function sendNewContact($request)
    {

        $this->contactModel->create([

                "email" => $request->get("email"),
                "subject" => $request->get("subject"),
                "message" => $request->get("message")

        ]);

    }



    public function getContactById($id)
    {

        return $this->contactModel->where(['id' => $id])->first();

    }



    public function update($contact, $request)
    {

        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');
        $contact->save();

    }











}
