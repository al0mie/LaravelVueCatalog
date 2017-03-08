<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'name', 'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
