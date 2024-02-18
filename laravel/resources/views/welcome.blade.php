@extends('layout')

@section('naslovStranice')
    Home
@endsection

@section('sadrzajStranice')
<div class="container">
    <h4>HOME</h4>
    @if ($sat >= 12)
        "dobar dan"
    @else
        "dobro jutro"
    @endif

    <p>Trenutno vreme je: {{ $trenutnoVreme }} i cas je {{ $sat }}</p>

    <hr>

    <h4>Newest products</h4>
    <p>
        @foreach ($newestSixProducts as $singleProduct)
            {{ $singleProduct->id }}<br>
            Naziv: {{ $singleProduct->name }}<br>
            Kolicina: {{ $singleProduct->amount }}<br>
            Cena: {{ $singleProduct->price }}<br>
            <br>
        @endforeach
    </p>


</div>



@endsection
