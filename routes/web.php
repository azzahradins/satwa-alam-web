<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [\App\Http\Controllers\Controller::class, 'index'])->name('welcome');
Route::get('/tentang-kami', [\App\Http\Controllers\Controller::class, 'tentangKami'])->name('aboutus');
Route::get('/bantuan', [\App\Http\Controllers\Controller::class, 'bantuan'])->name('bantuan');
Route::get('/bantuan#fitur', [\App\Http\Controllers\Controller::class, 'bantuan'])->name('fitur');
Auth::routes(['verify' => true]);

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('role');
Route::get('/admin/contributions', [\App\Http\Controllers\AdminController::class, 'managepost'])->name('admin.manage')->middleware('role');
Route::get('/admin/users',[\App\Http\Controllers\AdminController::class, 'manageuser'])->name('admin.manageuser')->middleware('role');
Route::get('/admin/satwa',[\App\Http\Controllers\AdminController::class, 'managesatwa'])->name('admin.managesatwa')->middleware('role');

Route::get('/satwa', [\App\Http\Controllers\SatwaController::class, 'index'])->name('satwa');
Route::get('/satwa/detail/{animalsId}', [\App\Http\Controllers\SatwaController::class, 'detail'])->name('satwa_detail');
Route::get('/satwa/geojson/{id}.geojson', [\App\Http\Controllers\api\SatwaController::class, 'geojson'])->name('geojson');
Route::get('/satwacari', [\App\Http\Controllers\Data\SatwasController::class, 'cariSatwa']);
