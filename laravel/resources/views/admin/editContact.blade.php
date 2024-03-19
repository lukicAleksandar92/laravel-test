@extends('layout')

@section('title')
    Edit contact
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5 col-12 p-4">
            <h4>Edit contact</h4>

            <form class="row" method="POST" action="{{ route('contact.update', $contact->id) }}">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach
                @endif

                @csrf
                @method('PUT')
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input name="email" value="{{ $contact->email }}" required type="email" class="form-control"
                            placeholder="email">
                    </div>
                </div>
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input name="subject" value="{{ $contact->subject }}" required type="text"
                            class="form-control" placeholder="subject">
                    </div>
                </div>
                <div style="padding: 0;" class="mb-3 mt-2">
                    <textarea name="message" required class="form-control col-10" rows="3" placeholder="message">{{ $contact->message }}</textarea>
                </div>
                <button class="btn btn-outline-danger">Update contact</button>
            </form>
        </div>
    </div>
@endsection
