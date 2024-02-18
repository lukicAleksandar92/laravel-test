<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomePageController::class, 'index']);

Route::get("/shop", [ShopController::class, 'getAllProducts']);

Route::view("/about","about");

Route::get("/contact", [ContactController::class, 'index']);


// ADMIN contact

Route::get("/admin/allContacts", [AdminContactController::class, 'getAllContacts'])
->name("sviKontakti");

Route::post('/send-contact', [AdminContactController::class, 'sendContact']);

Route::get("/admin/delete-contact/{contact}", [AdminContactController::class, 'deleteContact'])->name("brisanjeKontakta");


Route::get('admin/contacts/{contact}/edit', [AdminContactController::class, 'editContact'])->name('editContact');

Route::put('admin/contacts/{contact}', [AdminContactController::class, 'updateContact'])->name('updateContact');


// ADMIN product

Route::get("/admin/all-products", [AdminProductsController::class, 'allProducts'])
->name("sviProizvodi");


Route::view("admin/add-product","admin/addProduct");

Route::post("/create-new-product", [AdminProductsController::class, 'createNewProduct'])->name("snimanjeOglasa");


Route::get('admin/products/{product}/edit', [AdminProductsController::class, 'editProduct'])->name('editProduct');

Route::put('admin/products/{product}', [AdminProductsController::class, 'updateProduct'])->name('updateProduct');

Route::get("/admin/delete-product/{product}", [AdminProductsController::class, 'deleteProduct'])->name("brisanjeProizvoda");
