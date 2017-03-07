<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Product;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::orderBy('id');

        return $products->paginate(50);
    }

    public function store()
    {
        
    }

    public function update($id)
    {
        
    }
}
