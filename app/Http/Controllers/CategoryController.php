<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = Category::orderBy('id');

        return $categories->paginate(50);
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();

        $this->categoryService->saveCategory($request, $category);

        return response($category, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $this->categoryService->saveCategory($request, $category);

        return response($category, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function categoryProducts($id)
    {
        $category = Category::findOrFail($id);
       
        return $category->products;
    }

    public function buildCategoryTree()
    {
        return $this->categoryService->buildTree();
    }

    public function categoryList()
    {
        return Category::all();
    }
}
