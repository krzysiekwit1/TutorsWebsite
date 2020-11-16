@extends('layouts.mainlayout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/pages/index.css') }}" />
@endsection
@section('content')
@include('errorMessage');
<!--<img src="https://britz.mcmaster.ca/images/nouserimage.gif/image" alt="">
 -->

@if (count($adverts) > 1)
<div class="container">
    @foreach ($adverts as $advert)
    <div class="advert row">
        <!-- advert photo left section -->
        <div class="col-md-3 col-xl-3">
            <img src="{{asset('/'.$advert->avatar)}}" alt="">

        </div>

        <!-- Advert middle section -->
        <div class="col-md-6 col-xl-6">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <span class="align-middle name">{{$advert->name}}</span>
                    <span class="align-middle nativ">nativ</span>

                    <span class="nativ-language">{{$advert->nativ_language_1}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->nativ_language_1.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />

                    @if ($advert->nativ_language_2!=NULL)
                    <span class="nativ-language">{{$advert->nativ_language_2}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->nativ_language_2.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <span class="teaches">teaches</span>
                    <span class="language">{{$advert->language_1}}</span>
                    <span class="language">{{$advert->language_level_1}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_1.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @if ($advert->language_2!=NULL)
                    <span class="language">{{$advert->language_2}}</span>
                    <span class="language">{{$advert->language_level_2}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_2.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                    @if ($advert->language_3!=NULL)
                    <span class="language">{{$advert->language_3}}</span>
                    <span class="language">{{$advert->language_level_3}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_3.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                    @if ($advert->language_4!=NULL)
                    <span class="language">{{$advert->language_4}}</span>
                    <span class="language">{{$advert->language_level_4}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_4.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                    @if ($advert->language_5!=NULL)
                    <span class="language">{{$advert->language_5}}</span>
                    <span class="language">{{$advert->language_level_5}}</span>
                    <img src="{{ url('storage/flagsIcons/'.$advert->language_5.'.png') }}" alt="" title=""
                        class="align-middle" style="height:17px;width:20px;" />
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="description-container col-md-12 col-xl-12">
                    <span class="description">{{$advert->description}}</span>
                </div>
            </div>
        </div>
        <!-- advert price and button right section -->
        <div class="col-md-3 col-xl-3">
            <div class="row">
                <span class="price-span">Price:</span>
                <span class="price">{{$advert->price}}/lesson </span>

            </div>
            <div class="row">
                <a href="#">
                    <button id="{{$advert->id}}" class="button-contact">Contact</button>
                </a>
                <a href="http://localhost:8000/messages/create/{{$advert->user_id}}">
                    <button class="button-profile">Profile</button>
                </a>
            </div>
        </div>

    </div>

    @endforeach
</div>
@else
<p>there is no adverts</p>
@endif
<script src="{{asset('js/jqueryUi/external/jquery/jquery.js')}}"></script>
<script src="{{asset('js/jqueryUi/jquery-ui.min.js')}}"></script>
<script>
    $(".button-contact").click(function(id){
        var data ='';
        var id = $(this).attr("id");
        console.log(id);
        var data ={
        'userId': id
        };
    $.ajax({
    type: "POST",
    url: '/makeContact',
    data:data ,
    success: function(data){
        if(data.result=='success'){
        console.log(data);
        console.log('twoja stara');
        successFunc();
    }else{
        console.log('succes ale error');
        console.log(data.result);
        errorFunc();
    };
    },
    error: console.log('error'),
    });
    });
</script>
@endsection