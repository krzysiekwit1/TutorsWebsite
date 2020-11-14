<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $is_tutor = User::where('id',$userId)->select('is_tutor')->get('is_tutor');
        $aaa =$is_tutor->get('is_tutor');
        if($is_tutor == '0'){
            return 'dzia';
        }
        return $aaa;
        return $is_tutor[0]['is_tutor'];
            
    }
}
