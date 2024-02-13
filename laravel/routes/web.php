<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomePageController::class, 'index']);

Route::view("/about","about");

Route::get("/contact", [ContactController::class, 'index']);

Route::get("/shop", [ShopController::class, 'index']);


