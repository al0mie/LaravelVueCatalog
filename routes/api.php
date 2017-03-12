<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/products', 'ProductController', [
    'except' => ['create', 'edit']
]);

Route::resource('/categories', 'CategoryController', [
    'except' => ['create', 'edit']
]);

Route::get('/categoriesTree', ['as' => 'categoriesTree', 'uses' => 'CategoryController@buildCategoryTree']);