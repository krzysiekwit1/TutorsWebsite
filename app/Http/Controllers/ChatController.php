<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Contact;
use DB;
use Pusher\Pusher;



class ChatController extends Controller
{
    public function getMessage($user_id) {
        $my_id = Auth::id();
        //set message to read update
        Message::where(['from'=>$user_id,'to'=>$my_id])->update(['is_read'=>1]);

        // getting message for specified user
        $messages = Message::where( function ($query) use ($user_id , $my_id) {
            $query
            ->where('from',$my_id)
            ->where('to','=',$user_id);
        })
        ->orWhere( function ($query) use ($user_id , $my_id){
            $query
            ->where('from','=',$user_id)
            ->where('to','=',$my_id);
        })
        ->get();
        return view('messages.messageWindow')->with('messages',$messages);
    }


    public function index(){

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
        
        
        return view('messages.chat')
        ->with('users',$users);
        
    }
}
public function sendMessage(Request $request){
    $from = Auth::id();
    $to = $request->receiver_id;
    $message = $request->message;
        $message = new Message;
        $message->from =Auth::id();
        $message->to = $request->receiver_id;
        $message->message= $request->message;
        $message->is_read=0;
        $message->save();

        //pusher
        $options = array(
            'cluster'=>'eu'
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['from'=>$from,'to'=>$to,'message'=>$message]; //sending from and to after pressing enter
        $pusher->trigger('TutorsWebsite','my-event',$data);
        
}




    /*public function ShowSpecificMail($id){
        $authid=Auth::user()->id;
        
        $user = DB::table('users')
        ->join('messages','users.id','=','messages.user_id_2')
        ->where('messages.id',$id)
        ->select('users.id','users.name','messages.user_id_1')
        ->get();
        $id1=$user[0]->id;
        if($id1==$authid){

        $user = DB::table('users')
        ->join('messages','users.id','=','messages.user_id_1')
        ->where('messages.id',$id)
        ->select('users.id','users.name','messages.user_id_1')
        ->get();
        }
        
        $message = DB::table('messages')
        ->where('messages.id','=',$id)
        ->get();
        return view('messages.show')
        ->with('message',$message)
        ->with('user',$user);
        
    }*/
}
