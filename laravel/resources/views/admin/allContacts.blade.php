@extends('layout')

@section('title')
    Admin-All contacts
@endsection


@section('content')

<div class="container">
    <h4>All contacts (from newest to oldest)</h4>
    <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Created_at</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($allContacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>
                    <a href="{{route("contact.delete", ["contact"=>$contact->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Obrisi</a>

                    <a href="{{ route('contact.edit', ['contact' => $contact->id]) }}" class="btn btn-primary centered">Edituj</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>


@endsection
