<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('company', [CompanyController::class, 'index']);
Route::get('company/{id}', [CompanyController::class, 'show']);
Route::post('company', [CompanyController::class, 'store']);
