<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/check', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes added by AuthleteAuthorizationServerCommand.
Route::get('/.well-known/openid-configuration', '\App\Http\Controllers\Authlete\ConfigurationController');
Route::get('/authorization', '\App\Http\Controllers\Authlete\AuthorizationController');
Route::post('/authorization', '\App\Http\Controllers\Authlete\AuthorizationController');
Route::post('/authorization/decision', '\App\Http\Controllers\Authlete\AuthorizationDecisionController');

// Routes added by AuthleteAuthorizationServerCommand.
Route::get('/.well-known/openid-configuration', '\App\Http\Controllers\Authlete\ConfigurationController');
Route::get('/authorization', '\App\Http\Controllers\Authlete\AuthorizationController');
Route::post('/authorization', '\App\Http\Controllers\Authlete\AuthorizationController');
Route::post('/authorization/decision', '\App\Http\Controllers\Authlete\AuthorizationDecisionController');

// Routes added by AuthleteAuthorizationServerCommand.
Route::get('/.well-known/openid-configuration', '\App\Http\Controllers\Authlete\ConfigurationController');
Route::get('/authorization', '\App\Http\Controllers\Authlete\AuthorizationController');
Route::post('/authorization', '\App\Http\Controllers\Authlete\AuthorizationController');
Route::post('/authorization/decision', '\App\Http\Controllers\Authlete\AuthorizationDecisionController');

// Routes added by AuthleteAuthorizationServerCommand.
Route::get('/.well-known/openid-configuration', '\App\Http\Controllers\Authlete\ConfigurationController');
Route::get('/authorization', '\App\Http\Controllers\Authlete\AuthorizationController');
Route::post('/authorization', '\App\Http\Controllers\Authlete\AuthorizationController');
Route::post('/authorization/decision', '\App\Http\Controllers\Authlete\AuthorizationDecisionController');
