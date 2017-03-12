<?php

namespace App\Models;

use Baum\Node;
use App\Models\Product;

/**
 * Category
 */
class Category extends Node
{

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
