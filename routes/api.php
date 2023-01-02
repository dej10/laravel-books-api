<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductControiller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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



// Route::resource('/products', ProductControiller::class);


// Public Routes
Route::get('/products', [ProductControiller::class, 'index']);
Route::get('/products{id}', [ProductControiller::class, 'show']);
Route::get('/products/search/{name}', [ProductControiller::class, 'search']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);



//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductControiller::class, 'store']);
    Route::put('/products/{id}', [ProductControiller::class, 'update']);
    Route::delete('/products/{id}', [ProductControiller::class, 'destroy']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
