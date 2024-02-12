<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlacesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('getAll', [PlacesController::class, 'getAll']);
Route::get('/findOne/{id}', [PlacesController::class, 'findOne']);
Route::get('findByFilter/{name?}', [PlacesController::class, 'findByFilter']);
Route::post('create', [PlacesController::class, 'create']);
Route::put('/update/{id}', [PlacesController::class, 'update']);
