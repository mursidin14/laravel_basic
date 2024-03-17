<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routing
Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function() {
    return 'Hello World';
});

Route::redirect('/sosmed', '/testing');

// Routing parameter
Route::get('/products/{id}', function($productId){
    return "Products ${productId}";
});

Route::get('/products/{product}/items/{item}', function($productId, $itemId) {
    return "Products ${productId}, Items {$itemId}";
});

// Routing Parameter Regex
Route::get('categories/{id}', function($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+');

// Routing Parameter Optional
Route::get('/users/{id?}', function($userId = '404') {
    return "user ${userId}";
});

// Routing view
Route::get('/hello', function() {
    return view('hello', ['name' => 'mursidin']);
});

// View Nested
Route::get('/nested', function() {
    return view('nested.hello', ['nestedname' => 'antonio']);
});

// handling route 404 | not found
Route::fallback(function() {
    return '404 Not Found';
});