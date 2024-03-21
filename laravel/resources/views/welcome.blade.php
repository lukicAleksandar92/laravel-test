@extends('layout')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <h4>HOME</h4>
    @if ($sat >= 12)
        "Good day"
    @else
        "Good morning"
    @endif

    <p>Current time: {{ $trenutnoVreme }} & hour {{ $sat }}</p>

    <hr>

    <h4>Newest products</h4>
    <p>
        @foreach ($newestSixProducts as $singleProduct)
            {{ $singleProduct->id }}<br>
            Name: {{ $singleProduct->name }}<br>
            Amount: {{ $singleProduct->amount }}<br>
            Price: {{ $singleProduct->price }}<br>
            <br>
        @endforeach
    </p>


</div>



@endsection
