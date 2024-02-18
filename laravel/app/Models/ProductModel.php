<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{

    protected $table = "products";

    protected $fillable = [
        "name", "description", "amount", "price", "image" // Polja koja se mogu modif.i koristiti
    ];
}
