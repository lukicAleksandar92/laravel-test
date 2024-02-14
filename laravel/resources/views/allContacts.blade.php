@extends('layout')

@section('naslovStranice')
    Admin-All contacts
@endsection


@section('sadrzajStranice')

        @foreach($allContacts as $contact)
            {{ $contact->email }}<br>
            {{ $contact->subject }}<br>
            {{ $contact->message }}<br>
        @endforeach

@endsection
