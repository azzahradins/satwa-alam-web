<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\SendVerification;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index($email, $name){
        $send = Mail::to($email)->send(new SendVerification($name));
        if($send){
            return response()->json(['data' => 'Success send email!'], 200);
        }
    }
}
