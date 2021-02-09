<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Satwa;
use Illuminate\Http\Request;

class SatwasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function allSatwa(){
        return Satwa::all();
    }

    public static function allSatwaId($id){
        return Satwa::select()
        ->where('id', '=', $id)
        ->get();
    }

    public static function cariSatwa(Request $request){
        if ($request->has('q')) {
    		$cari = $request->q;
    		$data = Satwa::select('id', 'animals_name')->where('animals_name', 'LIKE', '%'.$cari.'%')->get();
    		return response()->json($data);
    	}else{
            return response()->json(Satwa::all());
        }
    }

    public static function allSatwaPaginate(){
        return Satwa::paginate(10);
    }

    public static function searchSatwa($search){
        return Satwa::select()
        ->where('animals_name', 'LIKE', $search)
        ->orWhere('scientific_name', 'LIKE', $search)
        ->orWhere('species', 'LIKE', $search)
        ->paginate(10);
    }

    public static function allSatwaImage($ид){
        return Satwa::select('photo')
        ->leftJoin('posts', function($join){
            $join->on('animals.id', '=', 'posts.id_animals');
        })
        ->where('animals.id', '=', $ид)
        ->get();
    }
}
