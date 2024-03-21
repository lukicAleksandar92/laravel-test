<?php

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Middleware\AdminCheckMidlleware;


Route::get("/", [HomePageController::class, "index"]);

Route::get("/shop", [ShopController::class, "getAllProducts"]);

Route::view("/about","about");

Route::get("/contact", [ContactController::class, "index"]);

Route::get("shop/{product}", [ShopController::class,"showSingleProduct"])->name("shop.permalink");

Route::post("/cart/add", [ShoppingCartController::class, "addToCart"])->name("cart.add");

Route::get("/cart", [ShoppingCartController::class, "index"])->name("cart.index");


Route::middleware(["auth", AdminCheckMidlleware::class])->prefix("/admin")->group(function () {

    // ADMIN contact

    Route::controller(AdminContactController::class)->name("contact.")->prefix("/contact")->group(function () {
        Route::get("/all", "getAllContacts")->name("all");
        Route::post("/send", "sendContact")->name("send");
        Route::get("/delete/{contact}",  "deleteContact")->name("delete");
        Route::get("/{contact}/edit", "editContact")->name("edit");
        Route::put("/{contact}", "updateContact")->name("update");
    });


    // ADMIN product

    Route::controller(AdminProductsController::class)->name("product.")->prefix("/product")->group(function () {

        Route::get("/all", "allProducts")->name("all");
        Route::post("/create-new", "createNewProduct")->name("create");
        Route::get("/{product}/edit", "editProduct")->name("edit");
        Route::put("/{product}", "updateProduct")->name("update");
        Route::get("/delete/{product}", "deleteProduct")->name("delete");

    });

    Route::view("/add-product","admin/addProduct");


});



/*
|--------------------------------------------------------------------------
| Web Routes - Auth
|--------------------------------------------------------------------------
*/


Route::get("/dashboard", function () {
    return view("dashboard");
})->middleware(["auth", "verified"])->name("dashboard");


Route::get("/dashboard", function () {
    return view("dashboard");
})->middleware(["auth", "verified"])->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");
});

require __DIR__."/auth.php";

