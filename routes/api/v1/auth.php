<?php

use Illuminate\Support\Facades\Route;

Route::get('/logout', [App\Http\Controllers\SSOAuthenticationController::class, 'logOut']);
