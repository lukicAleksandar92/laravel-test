@extends('layout')

@section('naslovStranice')
    Admin-All contacts
@endsection


@section('sadrzajStranice')

<div class="container">
    <h4>All contacts (from newest to oldest)</h4>
    <table class="table">
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
                    <a href="/admin/delete-contact/{{$contact->id}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Obrisi</a>

                    <a class="btn btn-primary">Edituj</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>


@endsection
