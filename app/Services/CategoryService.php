<?php

namespace App\Services;

class CategoryService
{
    /**
     * @param $request
     * @param $product
     */
    public function saveCategory($request, $category)
    {
        $category->name = $request->name;
        $category->save();
    }
}