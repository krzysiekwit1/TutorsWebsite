<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use DB;
use Illuminate\Validation\Rule;


class calendarController extends Controller
{
    
        public function calendar($month,$year){
        $userid=Auth::user()->id;

        $numberOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $todayDate = date('Y-m-d');

        $tutorEvents = DB::table('events')
        ->join('users',function ($join){
            $userid=Auth::user()->id;
            $join->on('events.user_id_2','=','users.id')
            ->where('events.user_id_1',$userid);
        })
        ->select('users.name','events.id','events.accepted','events.start','events.end','events.platform','events.language')->get();

        $studentEvents = DB::table('events')
        ->join('users',function ($join){
            $userid=Auth::user()->id;
            $join->on('events.user_id_2','=','users.id')
            ->where('events.user_id_2',$userid);
        })
        ->select('users.name','events.id','events.accepted','events.start','events.end','events.platform','events.language')->get();


// CONTACTS HERE
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

        $users = User::select('name')
        ->whereIn('id', $finalUsersList)
        ->get();
        $zero = 0;
        $users =DB::table('users')
        ->select(DB::raw('users.name,users.id'))
        ->leftJoin('messages',function($join) use ($my_id){
            $join->on('from','=','users.id');
            $join->on('to','=',DB::raw($my_id));
            $join->on('is_read','=',DB::raw(0));
        })
        ->whereIn('users.id', $finalUsersList)
        ->groupBy('users.id')
        ->get();


        
        
        
        return view('calendar/calendar')
        ->with('studentEvents',$studentEvents)
        ->with('tutorEvents',$tutorEvents)
        ->with('numberOfDays',$numberOfDays)
        ->with('choosedMonth',$month)
        ->with('choosedYear',$year)
        ->with('users',$users);

        
    }
    public function store(Request $request){
        $this->validate($request,[
        'email'=>['required','exists:mysql.users,id'],
        'start'=>'required',
        'end'=>'required',
        'language'=>'required'
        ]);
        if($request->start>$request->end){
            return redirect()->back()->with('error','Start cannot be after end');
        }
        $id = $request->email;
        $event = new Event;
        $event->language =$request->input('language');
        $event->platform =$request->input('platform');
        $event->user_id_1 =Auth::user()->id;
        $event->user_id_2=$id;
        $event->start=$request->input('start');
        $event->end=$request->input('end');
        $event->accepted=0;


        $event->save();

        $todayMonth = date('m');
        $todayYear = date('Y');


        return redirect('/calendar/'.$todayMonth .'/'.$todayYear)->with('success','You added lesson');





    }
}
