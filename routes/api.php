<?php

use App\Http\Controllers\Api as Api;
use Illuminate\Support\Facades\Route;

Route::get('pages/{slug?}/{any?}/{some?}', [Api\ApiPageController::class, 'index']);
Route::get('basic', [Api\ApiBasicController::class, 'index']);

