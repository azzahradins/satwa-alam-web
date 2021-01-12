<?php

use App\Http\Livewire\DetailSatwa;
use App\Http\Livewire\Satwa;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/contributions', \App\Http\Livewire\ManagePost::class)->name('manage');
Route::get('/satwa', \App\Http\Livewire\Satwa::class)->name('satwa');
Route::get('/satwa/detail/{id}', \App\Http\Livewire\DetailSatwa::class)->name('satwa_detail');
