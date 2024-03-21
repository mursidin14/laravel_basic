<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;

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
})->name('product.detail');

Route::get('/products/{product}/items/{item}', function($productId, $itemId) {
    return "Products ${productId}, Items {$itemId}";
})->name('product.item.detail');

// Routing Parameter Regex
Route::get('categories/{id}', function($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+')->name('category.detail');

// Routing Parameter Optional
Route::get('/users/{id?}', function($userId = '404') {
    return "user ${userId}";
});

// Routing named product
Route::get('product/{id}', function($productId) {
    $link = route('product.detail', ['id' => $productId]);
    return "Link $link";
});

Route::get('product-redirect/{id}', function($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

// Routing view
Route::get('/hello', function() {
    return view('hello', ['name' => 'mursidin']);
});

// View Nested
Route::get('/nested', function() {
    return view('nested.hello', ['nestedname' => 'antonio']);
});

// Controller
Route::get('controller/hello/request', [HelloController::class, 'request']);
Route::get('controller/hello', [HelloController::class, 'hello']);

// Input Controller
Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello/first', [InputController::class, 'helloFirst']);
Route::post('/input/hello/input', [InputController::class, 'helloInput']);
Route::post('/input/hello/array', [InputController::class, 'arrayInput']);
Route::post('/input/type', [InputController::class, 'inputType']);
Route::post('/input/filter/only', [InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [InputController::class, 'filterExcept']);
Route::post('input/filter/marge', [InputController::class, 'filterMarge']);

// File upload controller
Route::post('/file/upload', [FileController::class, 'upload']);

// Response
Route::get('/response/hello', [ResponseController::class, 'response']);
Route::get('/response/header', [ResponseController::class, 'header']);
Route::get('/response/type/view', [ResponseController::class, 'responseView']);
Route::get('/response/type/json', [ResponseController::class, 'responseJson']);
Route::get('/response/type/file', [ResponseController::class, 'responseFile']);
Route::get('/response/type/download', [ResponseController::class, 'responseDownload']);

// cookie
Route::get('/cookie/set', [CookieController::class, 'createCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
Route::get('/cookie/clear', [CookieController::class, 'clearCookie']);

// Redurect
Route::get('/redirect/to', [RedirectController::class, 'redirectTo']);
Route::get('/redirect/from', [RedirectController::class, 'redirectFrom']);
Route::get('/redirect/name', [RedirectController::class, 'redirectName']);
Route::get('/redirect/name/{name}', [RedirectController::class, 'redirectHello'])->name('redirect-hello');
Route::get('/redirect/action', [RedirectController::class, 'redirectAction']);
Route::get('/redirect/yt', [RedirectController::class, 'redirectAway']);

// handling route 404 | not found
Route::fallback(function() {
    return '404 Not Found';
});