<?php

use App\Http\Controllers\Api\CartApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;

Route::apiResource('products', ProductApiController::class);
Route::middleware('web')->get('changeQuantity', [CartApiController::class, 'changeQuantity']);