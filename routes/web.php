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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function() {
    return 'Hello World';
});

Route::redirect('/sosmed', '/testing');

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
    return '404';
});