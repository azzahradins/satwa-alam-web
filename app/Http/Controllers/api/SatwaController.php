<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Satwa;
use App\Models\Posts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class SatwaController extends Controller
{
    public function __construct(){
        $this->middleware('jwt.verify', ['except' => ['index', 'detail', 'show']]);
    }

    public function index(){
        $satwa = Satwa::simplePaginate(5);
        return response()->json($satwa, 200);
    }

    public function show($search){
        $result = Satwa::where('animals_name', 'like', "%{$search}%")
                    ->simplePaginate(10);
        return response()->json($result,200);
    }

    public function detail($id){
        $posts = Posts::where('id_animals', '=', $id)
        ->where('verified', '=', '1')->simplePaginate(10);
        return response()->json($posts, 200);
    }

    public function showPendingPost(){
        try{
            $GetID = Posts::where('id_user', '=', Auth::user()->id)->simplePaginate(10);
            return response()->json($GetID, 200);
        }catch(MethodNotAllowedHttpException $ex){
            return response()->json(["message"=>"Bad Request", "status" => 401], 401);
        }
    }

    public function showDetailedPendingPost($id){
        try{
            $GetID = Posts::where('id_user', '=', Auth::user()->id)
            ->where('id', '=', $id)->get();
            return response()->json($GetID[0], 200);
        }catch(Exception $ex){
            return response()->json(["message"=>"Bad Request", "status" => 401], 401);
        }
    }

    public function create(Request $request){
        //checking validate post data
        $name = Auth::user()->name;
        $validator = Validator::make($request->all(), [
            'id_animals' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'photo1' => 'required|file|mimes:pdf,png,jpg|max:1000',
            'photo2' => 'file|mimes:pdf,png,jpg|max:1000',
            'photo3' => 'file|mimes:pdf,png,jpg|max:1000',
        ]);
        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->all()[0], 'status' => 400], 400);
        }

        //Upload + move images
        $storeImageNames = array();
        $image = $request->photo1->getClientOriginalExtension();
        $namaFile = $name.'-'.time().'-1.'.$image;
        $request->photo1->move('uploads',$namaFile);
        array_push($storeImageNames,$namaFile);
        if($request->photo2 != null){
            $image = $request->photo2->getClientOriginalExtension();
            $namaFile = $name.'-'.time().'-2.'.$image;
            $request->photo2->move('uploads',$namaFile);
            array_push($storeImageNames,$namaFile);
        }
        if($request->photo3 != null){
            $image = $request->photo3->getClientOriginalExtension();
            $namaFile = $name.'-'.time().'-3.'.$image;
            $request->photo3->move('uploads',$namaFile);
            array_push($storeImageNames,$namaFile);
        }

        //input data
        $validateData = Posts::create([
            'id_animals' => $request->input('id_animals'),
            'type' => $request->input('type'),
            'photo'=> implode("_",$storeImageNames),
            'lat' => $request->input('lat'),
            'lng' =>$request->input('lng'),
            'user_notes' =>$request->input('user_notes'),
            'id_user' => Auth::user()->id
        ]);
        return response()->json($validateData, 200);
    }

    public function update(Request $request, $id){
        //checking validate post data
        $validator = Validator::make($request->all(), [
            'id_animals' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->all()[0], 'status' => 400], 400);
        }

        $GetID = Posts::where('id_user', '=', Auth::user()->id)
        ->where('id', '=', $id)
        ->update([
            'id_animals' => $request->input('id_animals'),
            'type' => $request->input('type'),
            'lat' => $request->input('lat'),
            'lng' =>$request->input('lng'),
            'user_notes' =>$request->input('user_notes'),
        ]);

        if($GetID == 1){
            return response()->json(["message"=>"Data berhasil diubah!", "status" => 200], 200);
        }else{
            return response()->json(["message"=>"Anda tidak memiliki hak akses pada situs ini", "status" => 401], 401);
        }
    }

    public function delete(Request $request){
        try{
            $GetID = Posts::where('id_user', '=', Auth::user()->id)->where('id', '=', $request->id)->delete();
            if($GetID == 1){
                return response()->json(["message"=>"Data berhasil dihapus!", "status" => 200], 200);
            }else{
                return response()->json(["message"=>"Data gagal dihapus!", "status" => 401], 401);
            }
        }catch(Exception $e){
            return response()->json(['user_not_found'], 404);
        }
    }
}
