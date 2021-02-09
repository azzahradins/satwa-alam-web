<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Satwa;
use App\Models\User;
use App\Models\Posts;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $totalKontributor = User::all();
        $totalSatwa = Satwa::all();
        $satwa = Satwa::distinct()->limit(10)->get(['species']);
        $totalPosts = Posts::all();
        return view('welcome')->with([
            'kontributor' => $totalKontributor->count(),
            'satwa' => $totalSatwa->count(),
            'posts' => $totalPosts->count(),
            'items' => $satwa
        ]);
    }

    public function bantuan(){
        return view('bantuan');
    }

    public function tentangKami(){
        return view('aboutus');
    }
}
