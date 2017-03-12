<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * List of all products
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id');

        if ($request->has('category_id')) {
            $products = $products->where('category_id', $request->get('category_id'));
        }

        return $products->paginate(50);
    }

    /**
     * Create a new product
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();

        if ($request->hasFile('avatar')) {
            $this->productService->uploadAvatar($request, $product);
        }

        $this->productService->saveProduct($request, $product);

        return response($product, Response::HTTP_CREATED);
    }

    /**
     * Show specific product
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Update specific product
     *
     * @param ProductRequest $request
     * @param $id
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $this->productService->deleteCurrentAvatar($product);
            $this->productService->uploadAvatar($request, $product);
        }

        $this->productService->saveProduct($request, $product);

        return response($product, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $this->productService->deleteCurrentAvatar($product);

        Product::destroy($id);
    }
}
