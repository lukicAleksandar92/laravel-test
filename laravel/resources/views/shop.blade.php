@extends("layout")

    @section("naslovStranice")
        Shop
    @endsection

    @section("sadrzajStranice")
    <div class="container">
    <h3>Shop</h3>
    <hr>

        <p>
            @foreach ($allProducts as $singleProduct)
                {{-- @if ($singleProduct == 'BMW G20' || $singleProduct == 'BMW F30')
                    <p>{{ $singleProduct }} -AKCIJA</p>
                @else
                    <p>{{ $singleProduct }} </p>
                @endif --}}


                Naziv: {{ $singleProduct->name}}<br>
                Kolicina: {{ $singleProduct->amount}}<br>
                Cena: {{ $singleProduct->price}}<br>
                <br>



            @endforeach
        </p>
    </div>
    @endsection
