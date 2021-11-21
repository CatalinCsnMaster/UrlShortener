<?php

use App\Http\Controllers\UrlController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/urls', [UrlController::class, 'index'])->name('urls');
Route::prefix('/url')->group( function() {
    Route::post('/store', [UrlController::class, 'store']);
    Route::put('/{id}', [UrlController::class, 'update']);
    Route::delete('/{id}', [UrlController::class, 'destroy']);
    }
);
