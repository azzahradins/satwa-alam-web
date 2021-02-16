<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ManageUsersController extends Controller
{
    use WithPagination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function allUsers(){
        return User::select()
        ->orderby('created_at', 'desc')
        ->take(5)
        ->get();
    }

    public static function pendingUsers(){
        return User::select()
        ->where('levels', '=', '3')
        ->take(5)
        ->get();
    }

    public static function allUsersWithLevel(){
        return User::select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.levels', 'user_level.desc')
        ->leftJoin('user_level', function($join){
            $join->on('users.levels', '=', 'user_level.id');
        })
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
    }

    public static function allUserLevel(){
        return DB::table('user_level')->get();;
    }

    public static function allUserSortLevel($level){
        return User::select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.levels', 'user_level.desc')
        ->leftJoin('user_level', function($join){
            $join->on('users.levels', '=', 'user_level.id');
        })
        ->where('levels', '=', $level)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
    }

    public static function allUserSearchLevel($search){
        return User::select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.levels', 'user_level.desc')
        ->leftJoin('user_level', function($join){
            $join->on('users.levels', '=', 'user_level.id');
        })
        ->where('name', 'LIKE', $search)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
    }

    public static function allUserSortSearchLevel($level, $search){
        return User::select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.levels', 'user_level.desc')
        ->leftJoin('user_level', function($join){
            $join->on('users.levels', '=', 'user_level.id');
        })
        ->where('levels', '=', $level)
        ->where('name', 'LIKE', $search)
        ->orderBy('created_at', 'DESC')
        ->paginate(10);
    }

    public static function grantAdmin($id){
        return User::where('id', '=', $id)->update([
            'levels' => 1
        ]);
    }

    public static function revokeAdmin($id){
        return User::where('id', '=', $id)->update([
            'levels' => 2
        ]);
    }

    public static function grantUser($id){
        return User::where('id', '=', $id)->update([
            'levels' => 2
        ]);
    }

    public static function revokeUser($id){
        return User::where('id', '=', $id)->update([
            'levels' => 3
        ]);
    }
}
