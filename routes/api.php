<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\VideoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('pengguna/login', [PenggunaController::class, 'loginPengguna']);
Route::post('pengguna/register', [PenggunaController::class, 'registerPengguna']);
Route::get('pengguna/{id}', [PenggunaController::class, 'getPenggunaById']);

Route::get('video/bereksperimen', [VideoController::class, 'getVideoBereksperimenYuk']);
Route::get('video/tahukahkamu', [VideoController::class, 'getVideoTahukahKamu']);
Route::get('video/tipstrik', [VideoController::class, 'getVideoTipsTrik']);
