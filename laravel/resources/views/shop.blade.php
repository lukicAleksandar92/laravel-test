@extends("layout")

    @section("naslovStranice")
        Shop
    @endsection

    @section("sadrzajStranice")

        <p>
            @foreach ($products as $singleProduct)
                @if ($singleProduct == 'BMW G20' || $singleProduct == 'BMW F30')
                    <p>{{ $singleProduct }} -AKCIJA</p>
                @else
                    <p>{{ $singleProduct }} </p>
                @endif



            @endforeach
        </p>

    @endsection
