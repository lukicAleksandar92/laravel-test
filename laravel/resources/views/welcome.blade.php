
@extends('layout')

    @section("naslovStranice")
        Home
    @endsection

    @section("sadrzajStranice")

        <p>Trenutno vreme je: {{ date("H:i:s") }}</p>

    @endsection





