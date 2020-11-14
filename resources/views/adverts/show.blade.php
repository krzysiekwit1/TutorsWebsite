@extends('layouts.mainlayout')

<div style="height:7rem;" class="container"></div>

<div class="row col-md-12" style="background-color: rgba(236, 241, 241, 0.719);
width:80%;margin-left:10%;margin-top:10px; ">

     <div class="row" style="width:200px;height:200px;margin-right:15px;">
          <img src="https://britz.mcmaster.ca/images/nouserimage.gif/image" alt="">
     </div>
     <div class="row col-md-6">
          <div style='height: 50px;' class="container">
               <div class="row col-md-12">
                    <a href="/adverts/{{$advert->id}}" style='font-size:25px;'>{{$advert->name}}</a>
                    <p style='font-size:10px;padding-left:10px;margin-top:15px;'>Język natywny</p>
                    <p style='padding-left:10px;margin-top:10px;'>{{$advert->nativ_language_1}}</p>
                    <img style='width:20px;height:20px;margin-top:12px;margin-left:4px;'
                         src="{{asset('storage/flagsIcons/'.$advert->nativ_language_1.'.png')}}" alt="">
                    @if($advert->nativ_language_2!=NULL)
                    <p style='padding-left:10px;margin-top:10px;'>{{$advert->nativ_language_2}}</p>
                    <img style='width:20px;height:20px;margin-top:12px;margin-left:4px;'
                         src="{{asset('storage/flagsIcons/'.$advert->nativ_language_2.'.png')}}" alt="">
                    @endif
               </div>
          </div>
          <div class="container">
               <div class="row">
                    <p style='font-size:10px;padding-left:10px;margin-top:15px;'>Naucza z</p>
                    <p style='padding-left:10px;margin-top:10px;'>{{$advert->language_1}}</p>
                    <p style='padding-left:4px;margin-top:10px;'>{{$advert->language_level_1}}</p>
                    <img style='width:20px;height:20px;margin-top:12px;margin-left:4px;'
                         src="{{asset('storage/flagsIcons/'.$advert->language_1.'.png')}}" alt="">
                    @if($advert->language_2!=NULL)
                    <p style='padding-left:10px;margin-top:10px;'>{{$advert->language_2}}</p>
                    <p style='padding-left:4px;margin-top:10px;'>{{$advert->language_level_2}}</p>
                    <img style='width:20px;height:20px;margin-top:12px;margin-left:4px;'
                         src="{{asset('storage/flagsIcons/'.$advert->language_2.'.png')}}" alt="">
                    @endif @if($advert->language_3!=NULL)
                    <p style='padding-left:10px;margin-top:10px;'>{{$advert->language_3}}</p>
                    <p style='padding-left:4px;margin-top:10px;'>{{$advert->language_level_3}}</p>
                    <img style='width:20px;height:20px;margin-top:12px;margin-left:4px;'
                         src="{{asset('storage/flagsIcons/'.$advert->language_3.'.png')}}" alt="">
                    @endif @if($advert->language_4!=NULL)
                    <p style='padding-left:10px;margin-top:10px;'>{{$advert->language_4}}</p>
                    <p style='padding-left:4px;margin-top:10px;'>{{$advert->language_level_4}}</p>
                    <img style='width:20px;height:20px;margin-top:12px;margin-left:4px;'
                         src="{{asset('storage/flagsIcons/'.$advert->language_4.'.png')}}" alt="">
                    @endif @if($advert->language_5!=NULL)
                    <p style='padding-left:10px;margin-top:10px;'>{{$advert->language_5}}</p>
                    <p style='padding-left:4px;margin-top:10px;'>{{$advert->language_level_5}}</p>
                    <img style='width:20px;height:20px;margin-top:12px;margin-left:4px;'
                         src="{{asset('storage/flagsIcons/'.$advert->language_5.'.png')}}" alt="">
                    @endif
               </div>
          </div>
          <div class="container">
               <p></p>
          </div>
     </div>
     <div class="row col-md-6">

     </div>

</div>