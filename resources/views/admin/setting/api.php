<?php

use App\Http\Controllers\admin\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\api\APIController;
use App\http\Controllers\FrontController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('brands',[BrandController::class, 'brands']);
Route::post('brands',[BrandController::class, 'brands_store']);
Route::delete('brands',[BrandController::class, 'brands_destroy']);