<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Log;
use Event;


class PagesController extends Controller
{
    public function index(){
        $adverts=DB::table('adverts')
        ->join('users','adverts.user_id','=','users.id')
        ->select ('adverts.*','users.avatar')
        ->get();
        return view('pages/index')->with('adverts',$adverts);

        $adverts = Advert::all();
        return view('pages/index')->with('adverts',$adverts);
    }
        public function about(){
        echo 'about';
    }

        public function SignUp(){
        return view('auth/register');
    }


}
