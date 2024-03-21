
@extends('layout')

@section('title')
    Product {{$product->id}}
@endsection

@section('content')
<div class="container">


    <h5>name: {{ $product->name }}</h5>
    <p>price: {{ $product->price }}</p>
    <p>amount: {{ $product->amount }}</p>
    <p>description: {{ $product->description }}</p>
    <p>image: {{ $product->image }}</p>

    <form action="{{ route("cart.add") }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="text" name="quantity" placeholder="Enter amount">

        <button class="btn btn-danger">Add to cart</button>

    </form>


</div>



@endsection
