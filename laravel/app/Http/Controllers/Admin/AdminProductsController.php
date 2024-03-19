<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    private $productRepo;

    public function __construct()
    {

        $this->productRepo = new ProductRepository;

    }


    public function allProducts()
    {

        $allProducts = ProductModel::orderBy("id", "desc")->get();

        return view("admin/allProducts", compact("allProducts"));
    }



    public function createNewProduct(SaveProductRequest $request)
    {

        $this->productRepo->createNew($request);

        return redirect()->route("product.all");

    }



    public function deleteProduct(ProductModel $product)
    {

        $product->delete();

        return redirect()->back();
    }



    public function editProduct(ProductModel $product)
    {
        return view("admin.editProduct", compact("product"));
    }




    public function updateProduct(UpdateProductRequest $request, ProductModel $product)
    {

        $this->productRepo->update($product, $request);

        return redirect()->route("product.all");
    }


}
