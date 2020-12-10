@extends('layouts.mainlayout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('css/advert/show.css') }}" />
@endsection
@section('content')





<div style="border-radius:5px;" class="w-50 container">
     <div class="row">
          <div class="col-md-6 col-xl-6">
               <img class="" style="width:80%;margin:15px 8%;border-radius:15px;" src="{{asset('/'.$avatar->avatar)}}"
                    alt="">
          </div>
          <div class="col-md-6 col-xl-6">
               <div class="row">
                    <a href="#">
                         <button id="{{$advert->user_id}}" class="button-contact">Contact</button>
                    </a>
                    <input id="advertUserIdContainer" type="text" value="{{$advert->user_id}}" hidden>
               </div>
               <div class="row">
                    <div id="ratingSpan" class="row">
                         Rating
                    </div>
               </div>

               <div class="row">

                    <div id="ratingRow" class="row">
                         <div class="rating">
                              <button id="sendRatingButton" style="display:none;"> Send</button>
                              <input class="rating-radio-input" type="radio" name="rating" value="5" id="rating5">
                              <label class="rating-label" for="rating5">☆</label>
                              <input class="rating-radio-input" type="radio" name="rating" value="4" id="rating4">
                              <label class="rating-label" for="rating4">☆</label>
                              <input class="rating-radio-input" type="radio" name="rating" value="3" id="rating3">
                              <label class="rating-label" for="rating3">☆</label>
                              <input class="rating-radio-input" type="radio" name="rating" value="2" id="rating2">
                              <label class="rating-label" for="rating2">☆</label>
                              <input class="rating-radio-input" type="radio" name="rating" value="1" id="rating1">
                              <label class="rating-label" for="rating1">☆</label>
                         </div>

                    </div>

               </div>
          </div>
     </div>
     <div class="row">
          <div class="col-md-12 col-xl-12">
               <span class="align-middle name">{{$advert->name}}</span>
               <br>
               <span class="price-span">Price:</span>
               <span class="price">{{$advert->price}}/lesson </span>
               <br>
               <span class="align-middle nativ">nativ</span>
               <span class="nativ-language">{{$advert->nativ_language_1}}</span>
               <img src="{{ url('storage/flagsIcons/'.$advert->nativ_language_1.'.png') }}" alt="" title=""
                    class="align-middle" style="height:17px;width:20px;" />
               @if ($advert->nativ_language_2!=NULL)
               <span class="nativ-language">{{$advert->nativ_language_2}}</span>
               <img src="{{ url('storage/flagsIcons/'.$advert->nativ_language_2.'.png') }}" alt="" title=""
                    class="align-middle" style="height:17px;width:20px;" />
               @endif
               <br>
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
               <br>
               <span class="description">{{$advert->description}}</span>
               <br>


          </div>
     </div>
</div>

<script src="{{asset('js/jqueryUi/external/jquery/jquery.js')}}"></script>
<script src="{{asset('js/jqueryUi/jquery-ui.min.js')}}"></script>
<script>
     $('#rating1,#rating2,#rating3,#rating4,#rating5').click(function(){
          $('#sendRatingButton').show();
          $('#sendRatingButton').click(function(){
          var ratingRadioValue = $("input[name='rating']:checked").val();
          var userId = $("#advertUserIdContainer").val();
               $.ajaxSetup({
                         headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                    });
                    var data ='';
                    console.log('radioinput:' +ratingRadioValue);
                    console.log('id:'+userId);
                    var data ={
                         'ratedUserRadioValue': ratingRadioValue,
                         'ratedUserId': userId
                    };
                    
               $.ajax({
                    type: "POST",
                    url: '/sendrating',
                    data:data ,
                    success: function(data){
                    if(data.result=="contactExists"){
                    alert('This tutor is in your contact list');
                    }else if(data.result == "AuthIDSameAsRatedID"){
                    alert("You can't rate yourself")
                    }else{
                    console.log('error Contact to adminstration')
                    }
                    },
                    error:function(data){
                    if(data.result=="contactExists"){
                    alert('This tutor is in your contact list');
                    }else if(data.result == "AuthIDSameAsRatedID"){
                         alert("You can't rate yourself")
                    }else{
                    console.log('error Contact to adminstration')
                    }
                    },
                    });
          
          $('#sendRatingButton').hide();
          });
          
     });
     $(".button-contact").click(function(id){
          function successFunc(){
               $('#addedToContactsButton').click();
          }
          $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
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
                    successFunc();
               }else if(data.result=='contactExists'){
                    alert('This tutor is in your contact list');
                    }else if(data.result="AuthIdSameAsContactTo"){
                         alert("You can't add yourself to contacts")
                    };
               },
          error:function(data){
               if(data.result=="contactExists"){
                    alert('This tutor is in your contact list');
               }else{
                    console.log('error Contact to adminstration')
               }
          },
     });
     });
</script>
@endsection