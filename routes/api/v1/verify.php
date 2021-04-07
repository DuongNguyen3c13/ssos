<?php

use Illuminate\Support\Facades\Route;

Route::get('/verifyToken', [App\Http\Controllers\SSOAuthenticationController::class, 'verifyToken']);
