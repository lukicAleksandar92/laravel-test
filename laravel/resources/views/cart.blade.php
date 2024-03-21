@extends('layout')

@section('title')
    Cart
@endsection


@section('content')
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                    </div>

                    @foreach ($cart as $cartItem)
                    @php
                    $product = $products->where('id', $cartItem['id'] )->first();
                    @endphp
                        <div class="card mb-4">

                            <div class="card-body p-4">

                                <div class="row align-items-center">
                                    <div class="col-md-1">
                                        <img src="" class="img-fluid" alt="{{ $product->image }}">
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">ID</p>
                                            <p class="lead fw-normal mb-0">
                                                {{ $cartItem['id'] }} </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Name</p>
                                            <p class="lead fw-normal mb-0">{{ $product->name }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Quantity</p>
                                            <p class="lead fw-normal mb-0">{{ $cartItem['quantity'] }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Price</p>
                                            <p class="lead fw-normal mb-0">{{ $product->price }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Total</p>
                                            <p class="lead fw-normal mb-0">{{ $cartItem['quantity'] * $product->price }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex justify-content-center">
                                        <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                    <div class="card mb-5">
                        <div class="card-body p-4">

                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Order total:</span> <span
                                        class="lead fw-normal">{{ $totalPrice }}</span>
                                </p>
                            </div>

                        </div>
                    </div>



                    <div class="card">
                        <div class="card-body text-end">
                            <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
