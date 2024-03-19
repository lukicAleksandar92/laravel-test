@extends('layout')

@section('title')
    Admin-All products
@endsection

@section('content')

<div class="container">
    <h4>All products (from newest to oldest)</h4>
    <a class="btn btn-outline-success centered" href="/admin/add-product">Add product</a>
<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th>Actions</th>
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
            <td>{{ $product->image }}</td>
            <td>
                <a href="{{route("product.delete", ['product' => $product->id])}}" class="btn btn-danger centered" onclick="return confirm('Are you sure you want to delete this item?');">Obrisi</a>

                <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-primary centered">Edituj</a>

            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
