<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Advert;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       // $user_id_1 = Advert::firstOrFail()->where('id', $id);
        $user_id_2 = DB::table('adverts')->where('user_id', $id)->value('user_id');
        $name = DB::table('adverts')->where('user_id', $id)->value('name');
        return view('messages.create')->with('user_id_2',$user_id_2)->with('name',$name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        

        $this->validate($request,[
        'title'=>'required',
        'text'=>'required'
        ]);

        $message = new Message;
                if($request->conversation_id){
        $message->conversation_id =$request->input('conversation_id');    
        }else{
            $max_conversation_id=Message::max('conversation_id');
            if($max_conversation_id==NULL){
                $max_conversation_id=1;
                $message->conversation_id = '1';
            }else{
                $message->conversation_id =$max_conversation_id+1;
            }
        }
        $message->title =$request->input('title');
        $message->text =$request->input('text');
        $message->user_id_1=Auth::user()->id;
        $message->user_id_2=$request->input('user_id_2');
        $message->user_id_1_deleted=0;
        $message->user_id_2_deleted=0;


        $message->save();

        return redirect('/')->with('success','Wysłałeś wiadomość');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
