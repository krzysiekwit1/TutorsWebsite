<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdvertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Adverts::orderby('created_at','dsc');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adverts.create');
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
        'nativ_language_1'=>'required',
        'language_1'=>'required',
        'language_level_1'=>'required',
        'name'=>'required',
        'price'=>'required',
        'description'=>'required'
        ]);
        
        //Push into database
        $advert = new Advert;
        $advert->name =$request->input('name');
        $advert->nativ_language_1 =$request->input('nativ_language_1');
        $advert->nativ_language_2 =$request->input('nativ_language_2');
        $advert->price =$request->input('price');
        $advert->description=$request->input('description');
        $advert->language_1 =$request->input('language_1');
        $advert->language_2 =$request->input('language_2');
        $advert->language_3 =$request->input('language_3');
        $advert->language_4 =$request->input('language_4');
        $advert->language_5 =$request->input('language_5');
        $advert->language_level_1 =$request->input('language_level_1');
        $advert->language_level_2 =$request->input('language_level_2');
        $advert->language_level_3 =$request->input('language_level_3');
        $advert->language_level_4 =$request->input('language_level_4');
        $advert->language_level_5 =$request->input('language_level_5');
        $advert->user_id=Auth::user()->id;
        $advert->save();
        $user = User::where('id','=',Auth::user()->id);
        $user->update(['advert_exists'=>$advert->id]);
        return redirect('/')->with('success','Dodałeś ogłoszenie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert= Advert::find($id);
        return view('adverts.show')->with('advert',$advert);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = Auth::id();
        $user = User::find($userId);
    
        $advert= Advert::find(Auth::user()->advert_exists);
        return view('adverts.edit')->with('advert',$advert)->with('user',$user);
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
        $this->validate($request,[
        'nativ_language_1'=>'required',
        'language_1'=>'required',
        'language_level_1'=>'required',
        'name'=>'required',
        'price'=>'required',
        'description'=>'required'
        ]);
        
        //Push into database
        $advert = Advert::find($id);
        $advert->name =$request->input('name');
        $advert->nativ_language_1 =$request->input('nativ_language_1');
        $advert->nativ_language_2 =$request->input('nativ_language_2');
        $advert->price =$request->input('price');
        $advert->description=$request->input('description');
        $advert->language_1 =$request->input('language_1');
        $advert->language_2 =$request->input('language_2');
        $advert->language_3 =$request->input('language_3');
        $advert->language_4 =$request->input('language_4');
        $advert->language_5 =$request->input('language_5');
        $advert->language_level_1 =$request->input('language_level_1');
        $advert->language_level_2 =$request->input('language_level_2');
        $advert->language_level_3 =$request->input('language_level_3');
        $advert->language_level_4 =$request->input('language_level_4');
        $advert->language_level_5 =$request->input('language_level_5');
        $advert->user_id=Auth::user()->id;
        $advert->save();
        return redirect('/adverts/'.Auth::user()->advert_exists.'/edit')->with('success','Z Edytowałeś ogłoszenie');

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
