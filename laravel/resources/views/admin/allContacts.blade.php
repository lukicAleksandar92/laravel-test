@extends('layout')

@section('naslovStranice')
    Admin-All contacts
@endsection


@section('sadrzajStranice')
<div class="container">
       <h4>All contacts (from newest to oldest)</h4>
        @foreach($allContacts as $contact)
            {{ $contact->created_at }}<br>
            {{ $contact->email }}<br>
            {{ $contact->subject }}<br>
            {{ $contact->message }}<br><hr>
        @endforeach
</div>
@endsection
