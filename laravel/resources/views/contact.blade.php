@extends('layout')

@section('naslovStranice')
    Contact
@endsection

@section('sadrzajStranice')
    @if(session('success'))
    <div class="row justify-content-center">
        <div class="alert alert-success col-md-5 col-12 p-4">
            {{ session('success') }}
        </div>
    @else

        <div class="row justify-content-center">
        <div class="col-md-5 col-12 p-4">
            <h3>Contact</h3>
            <hr>
            <h4>Write us</h4>
            <form class="row" method="POST" action="{{ route("posaljiKontakt")}}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {{ csrf_field() }}
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input value="" name="email" required type="email" class="form-control"
                            placeholder="Email *">
                    </div>
                </div>
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input value="" name="subject" required type="text" class="form-control" placeholder="Subject">
                    </div>
                </div>
                <div style="padding: 0;" class="mb-3 mt-2">
                    <textarea name="message" required class="form-control col-12" id="exampleFormControlTextarea1" rows="3"
                        placeholder="Message *"></textarea>
                </div>
                <button class="btn btn-danger">Send</button>
            </form>
        </div>
        <div class="col-md-5 col-12 p-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d181139.45821337495!2d20.25778543198834!3d44.81537040363694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2z0JHQtdC-0LPRgNCw0LQ!5e0!3m2!1ssr!2srs!4v1707661885903!5m2!1ssr!2srs"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    @endif

    <div class="col-md-5 col-12 p-4">
        <p>Go to <a href="/">Homepage</a> or <a href="/contact">send</a> another contact.</p>
    </div>
    </div>
@endsection
