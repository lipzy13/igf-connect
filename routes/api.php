<?php

use App\Http\Controllers\BizMatchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\KeyProductLineController;
use App\Http\Controllers\PrefferedPlatformController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('company', [CompanyController::class, 'index']);
Route::get('company/{id}', [CompanyController::class, 'show']);
Route::post('company', [CompanyController::class, 'store']);

Route::get('key-product-line', [KeyProductLineController::class, 'index']);
Route::get('key-product-line/{company_id}', [KeyProductLineController::class, 'getKeyProductByCompanyId']);
Route::post('key-product-line', [KeyProductLineController::class, 'store']);

Route::get('biz-matching', [BizMatchController::class, 'index']);
Route::get('biz-matching/{company_id}', [BizMatchController::class, 'getBizMatchByCompanyId']);
Route::post('biz-matching', [BizMatchController::class, 'store']);

Route::get('preferred-platform', [PrefferedPlatformController::class, 'index']);
Route::get('preferred-platform/{company_id}', [PrefferedPlatformController::class, 'getBizMatchByCompanyId']);
Route::post('preferred-platform', [PrefferedPlatformController::class, 'store']);
