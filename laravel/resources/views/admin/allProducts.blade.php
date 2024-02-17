@extends('layout')

@section('naslovStranice')
    Admin-All products
@endsection

@section('sadrzajStranice')

<div class="container">
    <h4>All products (from newest to oldest)</h4>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($allProducts as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>



@endsection
