<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Data\PostsController;
use App\Http\Controllers\Data\ManageUsersController;
use App\Http\Controllers\Data\SatwasController;
use Illuminate\Http\Request;
use App\Models\Posts;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontribusi = PostsController::kontribusi();
        $pending = PostsController::pending();
        $pendinguser = ManageUsersController::pendingUsers();
        $satwa = SatwasController::allSatwa();
        return view('admin', ['kontribusi' => $kontribusi, 'pending' => $pending, 'pendinguser' => $pendinguser, 'satwa' => $satwa]);
    }

    public function managepost(){
        return view('managepost');
    }

    public function manageuser(){
        return view('manageuser');
    }

    public function managesatwa(){
        return view('managesatwa');
    }
}
