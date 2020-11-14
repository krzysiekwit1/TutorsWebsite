<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index(){
        // showing user panel
        if($userId = Auth::id()){
        $user = User::find($userId);
        
        return view('/auth/userpanel')->with('user',$user);
        
    }
    }
    public function update_avatar(Request $request){
        //handling upload images via form
        if($request->hasFile('avatar')){
            $userId = Auth::id();
            // deleting old photo if not equal to default.png
            $avatar = Auth::user()->avatar;
            if($avatar  !='avatars/default.jpg'){
                Storage::delete($avatar);
            }
            
            


            $path = $request->file('avatar')->store('avatars');
            $filename = $path;

            $user = User::find($userId);
            $user->avatar = $filename;
            $user->save();
            return view('auth/userpanel')->with('user',$user)->with('success','Dodałeś Zdjęcie');


        }
    }
    public function isTutorUpdate(Request $request){
       // return response()->json(['result'=>$request->data]);
        


        if($userId = Auth::id()){
            $is_tutor = User::where('id',$userId)->select('is_tutor')->get();
            if($request->checkBoxValue == $is_tutor[0]['is_tutor']){
                return response()->json(['result'=>'success']);
            }else{
                $user = User::find($userId);
                $user->is_tutor = $request->checkBoxValue;
                $user->save();
                
                return response()->json(['result'=>'success']);

            }

            
        }


    }
    public function birthDateUpdate(Request $request){
        if($userId = Auth::id()){
            $maxDate = date('Y-m-d');
            $minDate = date('1940-01-01');
            $birthDate = User::where('id',$userId)->select('birth_date')->get();
            if($birthDate != $request->birthDate){
            if($request->birthDate > $minDate && $request->birthDate < $maxDate){
                $user = User::find($userId);
                $user->birth_date = $request->birthDate;
                $user->save();
            //return response()->json(['result'=>$request->birthDate]);
            $data = ['result'=>'success'];
            return response()->json($data);
            // $data= ['result'=>$request->birthDate];
            // return response()->json($data);

                }
            }else{
            $data = ['result'=>'success'];
            return response()->json($data);
            }
        }
    
    }
}
