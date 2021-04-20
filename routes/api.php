<?php

use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\PrivateRoutesTestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;

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

// Auth Routes
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::get('private-route', [PrivateRoutesTestController::class, 'test'])->middleware('auth:api');

Route::group([
  'prefix' => '/{tenant}',
  'middleware' => [
    'api',
    InitializeTenancyByPath::class,
  ],
], function () {
  Route::get('/', function () {
    return 'The id of the current tenant is ' . tenant('id');
  });

  Route::apiResource('users', UserController::class);
});
