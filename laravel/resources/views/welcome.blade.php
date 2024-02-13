
@extends('layout')

    @section("naslovStranice")
        Home
    @endsection

    @section("sadrzajStranice")


    @if ($sat >= 12)
        "dobar dan"
    @else
        "dobro jutro"
    @endif

        <p>Trenutno vreme je: {{ $trenutnoVreme }} i cas je {{ $sat }}</p>

    @endsection





