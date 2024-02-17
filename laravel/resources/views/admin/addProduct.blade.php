@extends('layout')

@section('naslovStranice')
    Add Product
@endsection


@section('sadrzajStranice')
    <div class="row justify-content-center">
        <div class="col-md-5 col-12 p-4">
            <h4>Add product</h4>

            <form class="row" method="POST" action="/create-new-product">
                @if ($errors->any())
                <p>Greska: {{ $errors->first() }}</p>
                @endif

            {{ csrf_field() }}
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input value="" name="name" required type="name" class="form-control"
                            placeholder="name ">
                    </div>
                </div>
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input value="" name="amount" required type="text" class="form-control" placeholder="amount">
                    </div>
                </div>
                <div style="padding: 0;" class="row mt-2 col-12">
                    <div class="col col-md-12 col-12 mt-2 mt-md-0">
                        <input value="" name="price" required type="text" class="form-control" placeholder="price">
                    </div>
                </div>
                <div style="padding: 0;" class="mb-3 mt-2">
                    <textarea name="description" required class="form-control col-12" id="exampleFormControlTextarea1" rows="3"
                        placeholder="description"></textarea>
                </div>
                <button class="btn btn-outline-danger">Create New Product</button>

            </form>

        </div>
    </div>
@endsection
