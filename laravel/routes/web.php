<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomePageController::class, 'index']);

Route::view("/about","about");

Route::get("/contact", [ContactController::class, 'index']);


Route::get("/shop", [ShopController::class, 'getAllProducts']);


// ADMIN start

Route::get("/admin/allContacts", [AdminContactController::class, 'getAllContacts']);

Route::post('/send-contact', [AdminContactController::class, 'sendContact']);


Route::get("/admin/add-product", [AdminProductsController::class, 'addProduct']);

Route::post("/create-new-product", [AdminProductsController::class, 'createNewProduct']);

Route::get("/admin/all-products", [AdminProductsController::class, 'allProducts']);


Route::get("/admin/delete-product/{product}", [AdminProductsController::class, 'delete']);

Route::get("/admin/delete-contact/{contact}", [AdminContactController::class, 'delete']);


// ADMIN end



