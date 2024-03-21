@extends("layout")

    @section("title")
        Shop
    @endsection

    @section("content")
    <div class="container">
    <h3>Shop</h3>
    <hr>

        <p>
            @foreach ($allProducts as $singleProduct)d
                Naziv: {{ $singleProduct->name}}<br>
                Kolicina: {{ $singleProduct->amount}}<br>
                Cena: {{ $singleProduct->price}}<br>
                <a class="btn btn-primary" href="{{ route("shop.permalink", ['product' => $singleProduct->id]) }}">Show product</a>
                <br>
                <br>
            @endforeach
        </p>
    </div>
    @endsection
