<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('v1')->namespace('API\v1')->group(function() {
    require base_path('routes/api/v1.php');
});

// Routes added by AuthleteAuthorizationServerCommand.
Route::get('/jwks', '\App\Http\Controllers\Authlete\JwksController');
Route::post('/revocation', '\App\Http\Controllers\Authlete\RevocationController');
Route::post('/token', '\App\Http\Controllers\Authlete\TokenController');

// Routes added by AuthleteAuthorizationServerCommand.
Route::get('/jwks', '\App\Http\Controllers\Authlete\JwksController');
Route::post('/revocation', '\App\Http\Controllers\Authlete\RevocationController');
Route::post('/token', '\App\Http\Controllers\Authlete\TokenController');

// Routes added by AuthleteAuthorizationServerCommand.
Route::get('/jwks', '\App\Http\Controllers\Authlete\JwksController');
Route::post('/revocation', '\App\Http\Controllers\Authlete\RevocationController');
Route::post('/token', '\App\Http\Controllers\Authlete\TokenController');

// Routes added by AuthleteAuthorizationServerCommand.
Route::get('/jwks', '\App\Http\Controllers\Authlete\JwksController');
Route::post('/revocation', '\App\Http\Controllers\Authlete\RevocationController');
Route::post('/token', '\App\Http\Controllers\Authlete\TokenController');
