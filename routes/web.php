<?php

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

Auth::routes();

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/contributions', \App\Http\Livewire\ManagePostLivewire::class)->name('manage');
Route::get('/satwa', \App\Http\Livewire\SatwaComponent::class)->name('satwa');
Route::get('/satwa/detail/{animalsId}', \App\Http\Livewire\DetailSatwaLivewire::class)->name('satwa_detail');
Route::get('/satwa/geojson/{id}.geojson', [\App\Http\Controllers\api\SatwaController::class, 'geojson'])->name('geojson');
