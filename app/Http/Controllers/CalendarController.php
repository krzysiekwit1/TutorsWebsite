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


        /*->join('users','events.user_id_1','=','users.id')
        ->orjoin('user','events.user_id_2','=','users.id')
        ->where('event.user_id1',$userid)
        ->orwhere()
        ->select('users.name','messages.title','messages.text','messages.id')
        ->get();
\
*/
        return view('calendar/calendar')
        ->with('studentEvents',$studentEvents)
        ->with('tutorEvents',$tutorEvents)
        ->with('numberOfDays',$numberOfDays)
        ->with('choosedMonth',$month)
        ->with('choosedYear',$year);
    }
    public function store(Request $request){
        $this->validate($request,[
        'email'=>['required','exists:mysql.users,email'],
        'start'=>'required',
        'end'=>'required',
        'language'=>'required'
        ]);
        if($request->start>$request->end){
            return redirect()->back()->with('error','Data początkowa nie może być po końcowej');
        }
        $id = User::where('email',$request->email)->first()->id;

        $event = new Event;
        $event->language =$request->input('language');
        $event->platform =$request->input('platform');
        $event->user_id_1 =Auth::user()->id;
        $event->user_id_2=$id;
        $event->start=$request->input('start');
        $event->end=$request->input('end');
        $event->accepted=0;


        $event->save();

        return redirect('/calendar/10/2020')->with('success','Dodałeś zajęcia');





    }
}
