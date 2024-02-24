<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMidlleware;
use App\Http\Middleware\TestMiddleware;

Route::get("/", [HomePageController::class, 'index']);

Route::get("/shop", [ShopController::class, 'getAllProducts']);

Route::view("/about","about");

Route::get("/contact", [ContactController::class, 'index']);


Route::middleware(['auth', AdminCheckMidlleware::class])->prefix('admin')->group(function () {

        // ADMIN contact

    Route::get("/allContacts", [AdminContactController::class, 'getAllContacts'])
    ->name("sviKontakti");

    Route::post('/send-contact', [AdminContactController::class, 'sendContact'])
    ;

    Route::get("/delete-contact/{contact}", [AdminContactController::class, 'deleteContact'])->name("brisanjeKontakta")
    ;


    Route::get('/contacts/{contact}/edit', [AdminContactController::class, 'editContact'])

    ->name('editContact');

    Route::put('/contacts/{contact}', [AdminContactController::class, 'updateContact'])
    ->name('updateContact');


    // ADMIN product

    Route::get("/all-products", [AdminProductsController::class, 'allProducts'])
    ->name("sviProizvodi");


    Route::view("/add-product","admin/addProduct")
    ;

    Route::post("/create-new-product", [AdminProductsController::class, 'createNewProduct'])
    ->name("snimanjeOglasa");


    Route::get('/products/{product}/edit', [AdminProductsController::class, 'editProduct'])
    ->name('editProduct');

    Route::put('/products/{product}', [AdminProductsController::class, 'updateProduct'])
    ->name('updateProduct');

    Route::get("/delete-product/{product}", [AdminProductsController::class, 'deleteProduct'])
    ->name("brisanjeProizvoda");


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

