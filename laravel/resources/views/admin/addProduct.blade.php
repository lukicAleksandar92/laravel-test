@extends('layout')

@section('title')
    Add Product
@endsection


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5 col-12 p-4">
            <h4>Add product</h4>

            <form class="row" method="POST" action="{{route("product.create")}}">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                    @endforeach
                @endif

            {{ csrf_field() }}

                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input  name="name" value="{{ old("name") }}" required type="name" class="form-control" placeholder="name">
                    </div>
                </div>
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input  name="amount" value="{{ old("amount") }}" required type="number" class="form-control" placeholder="amount">
                    </div>
                </div>
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input  name="price" value="{{ old("price") }}"  required type="number" class="form-control" placeholder="price">
                    </div>
                </div>
                <div style="padding: 0;" class="row mb-3 mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input type="text" name="image" class="form-control" placeholder="image">
                    </div>
                </div>
                <div style="padding: 0;" class="mb-3 mt-2">
                    <textarea name="description" required class="form-control col-10" rows="3" placeholder="description">{{ old("description") }}</textarea>
                </div>


                <button class="btn btn-outline-danger">Create New Product</button>

            </form>

        </div>
    </div>
@endsection
