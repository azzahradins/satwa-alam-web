<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use Livewire\WithPagination;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // untuk validasi
    public static function loadKontribusiAndUser($id){
        return Posts::select()
        ->leftJoin('users', function($join){
            $join->on('posts.id_user', '=', 'users.id');
        })
        ->where('posts.id', '=', $id)
        ->get();
    }

    //sorting dan listing semua post
    public static function sortKontribusiAll($status){
        return Posts::select()
        ->where('verified', '=', $status)
        ->paginate(6);
    }
    public static function searchKontribusiAll($searchTerm){
        return Posts::select()
        ->where('type', 'like', $searchTerm)
        ->paginate(6);
    }
    public static function sortsearchKontribusiAll($searchTerm, $status){
        return Posts::select()
        ->where('verified', '=', $status)
        ->where('type', 'like', $searchTerm)
        ->paginate(6);
    }
    // untuk admin yang perlu kontribusi untuk dimanage
    public static function loadKontribusiAll(){
        return Posts::select()
        ->orderBy('verified', 'ASC')
        ->orderBy('created_at', 'DESC')
        ->paginate(6);
    }

    // dengan function loadmore
    public static function kontribusi(){
        return Posts::select()
        ->orderby('created_at', 'desc')
        ->take(5)
        ->get();
    }

    // memilih yang belum terverifikasi
    public static function pending(){
        return Posts::select()
        ->where('verified', '=', '0')
        ->get();
    }
}
