<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMidlleware;


Route::get("/", [HomePageController::class, 'index']);

Route::get("/shop", [ShopController::class, 'getAllProducts']);

Route::view("/about","about");

Route::get("/contact", [ContactController::class, 'index']);


Route::middleware(['auth', AdminCheckMidlleware::class])->prefix('admin')->group(function () {

    // ADMIN contact

    Route::controller(AdminContactController::class)->group(function () {
        Route::get("/contacts/all", "getAllContacts")->name("sviKontakti");
        Route::post("/contacts/send", "sendContact")->name("posaljiKontakt");
        Route::get("/contacts/delete/{contact}",  'deleteContact')->name("brisanjeKontakta");

        Route::get("/contacts/{contact}/edit", 'editContact')->name('editContact');
        Route::put("/contacts/{contact}", 'updateContact')->name('updateContact');
    });


    // ADMIN product

    Route::controller(AdminProductsController::class)->group(function () {

        Route::get("/all-products", 'allProducts')->name("sviProizvodi");
        Route::post("/create-new-product", 'createNewProduct')->name("snimanjeOglasa");
        Route::get('/products/{product}/edit', 'editProduct')->name('editProduct');
        Route::put('/products/{product}', 'updateProduct')->name('updateProduct');

        Route::get("/delete-product/{product}", 'deleteProduct')->name("brisanjeProizvoda");

    });

    Route::view("/add-product","admin/addProduct");





});



/*
|--------------------------------------------------------------------------
| Web Routes - Auth
|--------------------------------------------------------------------------
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

