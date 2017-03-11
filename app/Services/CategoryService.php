<?php

namespace App\Services;

use App\Models\Category;

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

    public function buildTree(){
        $categories = Category::whereNull('parent_id')->get();

        $tree = [];
        foreach ($categories as $category) {
            $tree []= $this->buildCategoryPath($category);
        }

        return json_encode($tree);
    }

    private function buildCategoryPath($node, $data = [])
    {
        if (!$node->children->count()) {
            return ['name' => $node->name];
        } else {
            foreach ($node->children as $child) {
                $data['name'] = $child->name;
                $data[$node->name]['children'][] = $this->buildCategoryPath($child, $data);
            }

            return $data;
        }

    }

}