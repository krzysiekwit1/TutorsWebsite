<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Contact;


class UserController extends Controller
{
    public function index(){
        // showing user panel
        if($userId = Auth::id()){
        $user = User::find($userId);
        //contact list in unser panel
            if(Auth::check()){
        $my_id=Auth::user()->id;

        $usersList1 = DB::table('contacts')
        ->where('user_id_1','=',$my_id)
        ->get();
        $usersList1 = $usersList1
        ->pluck('user_id_2')
        ->toArray();

        $usersList2 = DB::table('contacts')
        ->where('user_id_2','=',$my_id)
        ->get();
        $usersList2 = $usersList2
        ->pluck('user_id_1')
        ->toArray();

        $finalUsersList = array_merge($usersList1, $usersList2);

        $users = User::select('id','name','avatar','email')
        ->whereIn('id', $finalUsersList)
        ->get();
        $zero = 0;
        $users =DB::table('users')
        ->select(DB::raw('users.id, users.name, users.avatar ,users.email ,count(is_read) as unread '))
        ->leftJoin('messages',function($join) use ($my_id){
            $join->on('from','=','users.id');
            $join->on('to','=',DB::raw($my_id));
            $join->on('is_read','=',DB::raw(0));
        })
        ->whereIn('users.id', $finalUsersList)
        ->groupBy('users.id')
        ->get();


        $usersa = DB::select("select users.id , users.name , users.avatar , users.email , count(is_read) as unread
        from users LEFT JOIN messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id(). " where users.id !=" .Auth::id(). "
        group by users.id , users.name , users.avatar , users.email ");
        
        
        
        
    }
        

        return view('/auth/userpanel')->with('user',$user)->with('users',$users);
        
    }
    }
    public function deleteContact(Request $request){
              //  return response()->json(['result'=>$request->data]);
            $userId = Auth::id();
            $id = $request->id;
            Contact::where([['user_id_1','=',$userId],['user_id_2','=', $id]])->delete();
            Contact::where([['user_id_1','=',$id],['user_id_2','=', $userId]])->delete();

                return response()->json(['result'=>'success']);


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

        public function userNameUpdate(Request $request){
            
        


        if($userId = Auth::id()){
                $user = User::find($userId);
                $user->name = $request->username;
                $user->save();
                
        return response()->json(['result'=>$request->username]);


            
        }


    }
}
