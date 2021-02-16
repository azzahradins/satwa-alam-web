<?php
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

Route::post('logout', [\App\Http\Controllers\api\AuthController::class, 'logout']);
Route::post('login', [\App\Http\Controllers\api\AuthController::class, 'login']);
Route::get('email/resend', [\App\Http\Controllers\api\VerificationController::class, 'resend'])->name('verification.resend');
Route::get('email/verify/{id}/{hash}', [\App\Http\Controllers\api\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('register', [\App\Http\Controllers\api\AuthController::class, 'register']);
Route::get('user', [\App\Http\Controllers\api\AuthController::class, 'me'])->middleware('jwt.verify');

// Satwa
Route::get('satwa', [\App\Http\Controllers\api\SatwaController::class, 'index']);
Route::get('satwa/{search}', [\App\Http\Controllers\api\SatwaController::class, 'show']);
Route::get('satwa/category/species', [\App\Http\Controllers\api\SatwaController::class, 'jenis']);
Route::get('satwa/detail/{id}', [\App\Http\Controllers\api\SatwaController::class, 'detail']);
Route::get('satwa/geojson/{id}.geojson', [\App\Http\Controllers\api\SatwaController::class, 'geojson'])->name('geojson');
Route::post('satwa/contribution/create', [\App\Http\Controllers\api\SatwaController::class, 'create'])->middleware('jwt.verify');
Route::get('satwa/contribution/pending', [\App\Http\Controllers\api\SatwaController::class, 'showPendingPost'])->middleware('jwt.verify');
Route::get('satwa/contribution/pending/{id}', [\App\Http\Controllers\api\SatwaController::class, 'showDetailedPendingPost'])->middleware('jwt.verify');
Route::delete('satwa/contribution/pending/{id}', [\App\Http\Controllers\api\SatwaController::class, 'delete'])->middleware('jwt.verify');
Route::put('satwa/contribution/pending/{id}', [\App\Http\Controllers\api\SatwaController::class, 'update'])->middleware('jwt.verify');
