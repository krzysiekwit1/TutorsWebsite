@extends('layouts.mainlayout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('css/advert/edit.css') }}" />
@endsection
@section('content')
@include('errorMessage');

<div class="row col-md-12" style="background-color: rgba(236, 241, 241, 0.719);
width:80%;margin-left:10%;margin-top:10px; ">

  <div class="col-md-3 col-xl-3">
    <img class="img-fluid" src="{{asset('/'.$user->avatar)}}" alt="">

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
        <img src="{{ url('storage/flagsIcons/'.$advert->language_1.'.png') }}" alt="" title="" class="align-middle"
          style="height:17px;width:20px;" />
        @if ($advert->language_2!=NULL)
        <span class="language">{{$advert->language_2}}</span>
        <span class="language">{{$advert->language_level_2}}</span>
        <img src="{{ url('storage/flagsIcons/'.$advert->language_2.'.png') }}" alt="" title="" class="align-middle"
          style="height:17px;width:20px;" />
        @endif
        @if ($advert->language_3!=NULL)
        <span class="language">{{$advert->language_3}}</span>
        <span class="language">{{$advert->language_level_3}}</span>
        <img src="{{ url('storage/flagsIcons/'.$advert->language_3.'.png') }}" alt="" title="" class="align-middle"
          style="height:17px;width:20px;" />
        @endif
        @if ($advert->language_4!=NULL)
        <span class="language">{{$advert->language_4}}</span>
        <span class="language">{{$advert->language_level_4}}</span>
        <img src="{{ url('storage/flagsIcons/'.$advert->language_4.'.png') }}" alt="" title="" class="align-middle"
          style="height:17px;width:20px;" />
        @endif
        @if ($advert->language_5!=NULL)
        <span class="language">{{$advert->language_5}}</span>
        <span class="language">{{$advert->language_level_5}}</span>
        <img src="{{ url('storage/flagsIcons/'.$advert->language_5.'.png') }}" alt="" title="" class="align-middle"
          style="height:17px;width:20px;" />
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
      <a href="">
        <button class="button-contact">Contact</button>
      </a>
      <a href="">
        <button class="button-profile">Profile</button>
      </a>
    </div>
  </div>
</div>


<div class="container">

  {!! Form::open(['action'=>['AdvertsController@update',$advert->id],'method'=>'POST','style'=>'width:100%;heiht:50%;'])
  !!}
  <div style='width:100%;height:50%;' class="container col-md-12 col-lg-12 fill">
    <div style="height:100%;" class="row col-md-12 fill">
      <div class="col-md-4 col-lg-4">
        {{Form::label('name','Title,name')}}
        {{Form::text('name',$advert->name,['class'=>'form-control','style'=>'font-size: 18px;','id'=>"name",'placeholder'=>'e.g. Prof. Your name'])}}
        {{Form::label('nativ_language_1','Nativ language 1')}}
        {{Form::text('nativ_language_1',$advert->nativ_language_1,['class'=>'form-control','list'=>'languageList','style'=>'font-size: 18px;','id'=>'nativLanguage1','placeholder'=>'e.g. Polish'])}}
        {{Form::label('nativ_language_2','Nativ language 2')}}
        {{Form::text('nativ_language_2',$advert->nativ_language_2,['class'=>'form-control','list'=>'languageList','style'=>'font-size: 18px;','id'=>'nativLanguage2','placeholder'=>'e.g. Polish'])}}

        <!-- -->
        {{Form::label('country','Country')}}
        {{Form::text('country',$advert->country ,['class'=>'form-control','list'=>'countryList','style'=>'font-size: 18px;','id'=>'country','placeholder'=>'e.g. Poland'])}}
        {{Form::label('city','City')}}
        {{Form::text('city',$advert->city ,['class'=>'form-control','style'=>'font-size: 18px;','id'=>'city','placeholder'=>'e.g. Warsaw'])}}
        <!-- -->
        {{Form::label('price','Price for 1 lesson and currency sign')}}
        {{Form::text('price',$advert->price,['class'=>'form-control','style'=>'font-size: 18px;','id'=>'price','placeholder'=>'e.g. 40$'])}}
        {{FORM::hidden('_method','PUT')}}
        {{FORM::submit('Submit',['class'=>'btn btn-primary','style'=>'font-size: 18px;','hidden','id'=>'editBtn'])}}
        <p id="fakeSubmitBtn">Edit</p>




      </div>
      <div class="col-md-4">
        <div class="row">
          <div class="form-group col-md-6">
            {{Form::label('language_1','Language 1')}}
            {{Form::text('language_1',$advert->language_1,['class'=>'input-lg form-control ','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language_1','id'=>'language1'])}}

          </div>
          <div class="form-group col-md-6">
            {{Form::label('language_level_1','Level')}}
            {{Form::text('language_level_1',$advert->language_level_1,['class'=>'form-control input-lg','list'=>'languageLevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel1'])}}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            {{Form::label('language_2','Language 2')}}
            {{Form::text('language_2',$advert->language_2,['class'=>'form-control input-lg','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language2'])}}

          </div>
          <div class="form-group col-md-6">
            {{Form::label('language_level_2','Level')}}
            {{Form::text('language_level_2',$advert->language_level_2,['class'=>'form-control input-lg','list'=>'languageLevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel2'])}}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            {{Form::label('language_3','Language 3')}}
            {{Form::text('language_3',$advert->language_3,['class'=>'form-control input-lg','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language3'])}}

          </div>
          <div class="form-group col-md-6">
            {{Form::label('language_level_3','Level')}}
            {{Form::text('language_level_3',$advert->language_level_3,['class'=>'form-control input-lg','list'=>'languageLevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel3'])}}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            {{Form::label('language_4','Language 4')}}
            {{Form::text('language_4',$advert->language_4,['class'=>'form-control input-lg','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language4'])}}

          </div>
          <div class="form-group col-md-6">
            {{Form::label('language_level_4','Level')}}
            {{Form::text('language_level_4',$advert->language_level_4,['class'=>'form-control input-lg','list'=>'languageLevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel4'])}}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            {{Form::label('language_5','Language 5')}}
            {{Form::text('language_5',$advert->language_5,['class'=>'form-control','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language5'])}}

          </div>
          <div class="form-group col-md-6">
            {{Form::label('language_level_5','Level')}}
            {{Form::text('language_level_5',$advert->language_level_5,['class'=>'form-control','list'=>'languageLevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel5'])}}
          </div>
        </div>

      </div>
      <div class="col-md-4">
        {{Form::label('description','Description (Some words about you)')}}
        {{Form::textarea('description',$advert->description,['class'=>'form-control','placeholder'=>'Description','style'=>'font-size: 18px;'])}}
      </div>
    </div>

  </div>

  {!! Form::close() !!}

  <datalist id="languageList">
    <option value="Arabic">
    <option value="Bulgarian">
    <option value="Cambodian">
    <option value="Chinese">
    <option value="Croatian">
    <option value="Czech">
    <option value="Danish">
    <option value="English">
    <option value="Estonian">
    <option value="French">
    <option value="Georgian">
    <option value="German">
    <option value="Greek">
    <option value="Hungarian">
    <option value="Icelandic">
    <option value="Irish">
    <option value="Italian">
    <option value="Japanese">
    <option value="Korean">
    <option value="Latvian">
    <option value="Lithuanian">
    <option value="Mongolian">
    <option value="Norwegian">
    <option value="Polish">
    <option value="Portuguese">
    <option value="Romanian">
    <option value="Russian">
    <option value="Serbian">
    <option value="Slovak">
    <option value="Spanish">
    <option value="Swedish">
    <option value="Thai">
    <option value="Turkish">
    <option value="Ukrainian">
    <option value="Vietnamese">
  </datalist>
  <datalist id="countryList">
    <option value="Arabia">
    <option value="Bulgaria">
    <option value="Cambodia">
    <option value="China">
    <option value="Croatia">
    <option value="Czech Republic">
    <option value="Denmark">
    <option value="England">
    <option value="Estonia">
    <option value="France">
    <option value="Georgia">
    <option value="Germany">
    <option value="Greece">
    <option value="Hungary">
    <option value="Iceland">
    <option value="Ireland">
    <option value="Italy">
    <option value="Japan">
    <option value="Korea">
    <option value="Latvia">
    <option value="Lithuania">
    <option value="Mongolia">
    <option value="Norway">
    <option value="Poland">
    <option value="Portugal">
    <option value="Romania">
    <option value="Russia">
    <option value="Serbia">
    <option value="Slovakia">
    <option value="Spain">
    <option value="Sweden">
    <option value="Thailand">
    <option value="Turkey">
    <option value="Ukraine">
    <option value="Vietnam">
  </datalist>
  <datalist id="languageLevelList">
    <option value="A1">
    <option value="A2">
    <option value="B1">
    <option value="B2">
    <option value="C1">
    <option value="C2">

  </datalist>
</div>
<script src="{{asset('js/jqueryUi/external/jquery/jquery.js')}}"></script>
<script src="{{asset('js/jqueryUi/jquery-ui.min.js')}}"></script>

<script>
  var languageList = ['Arabic','Bulgarian','Cambodian','Chinese','Croatian','Czech','Danish','English',
      'Estonian','French','Georgian','German','Greek','Hungarian','Icelandic',
      'Irish','Italian','Japanese','Korean','Latvian','Lithuanian','Mongolian',
      'Norwegian','Polish','Portuguese','Romanian','Russian','Serbian','Slovak',
      'Spanish','Swedish','Thai','Turkish','Ukrainian','Vietnamese'];
      
      var languageLevelList = ['A1','A2','B1','B2','C1','C2'];
// validation 1
  function validation(element,list){
  var value = $(element).val();
  
    if($.inArray(value,list)!= -1){
      return 1;
      $(element).css('border-color','green');
    } else{
      $(element).css('border-color','red');
      $(element).effect("shake", {times:4,distance:2}, 500);
      return 0 ;
    }
  }
  
  //validation2
$('#fakeSubmitBtn').click( function(){

  var status = '';
  var v = [];
  var value = '';
  var value2 = '';

  v[0] = validation('#language1',languageList);
  v[1] = validation('#languageLevel1',languageLevelList);
  v[2] = validation('#nativLanguage1',languageList);
  
  if($('#language2').val() != ''){
    value = validation('#language2',languageList)
    value2 = validation('#languageLevel2',languageLevelList);
    if(value == 0 || value2 == 0){
    status='error';
    }
  }
  if($('#language3').val() != ''){
    value = validation('#language3',languageList)
    value2 = validation('#languageLevel3',languageLevelList);
    if(value == 0 || value2 == 0){
    status='error';
    }
  }
  if($('#language4').val() != ''){
    value = validation('#language4',languageList)
    value2 = validation('#languageLevel4',languageLevelList);
    if(value == 0 || value2 == 0){
    status='error';
    }
  }
  if($('#language5').val() != ''){
    value = validation('#language5',languageList)
    value2 = validation('#languageLevel5',languageLevelList);
    if(value == 0 || value2 == 0){
    status='error';
    }
  }

  var x = $.inArray(0,v);
  if(x != -1){
      status = 'error';
  }
if($('#nativLanguage2').val() != ''){
    value = validation('#nativLanguage2',languageList)
    if(value == 0){
    status='error';
    }
  }
  if($('#name').val().length>=50){
    $('#name').css('border-color','red');
    $('#name').effect("shake", {times:4,distance:2}, 500);
    status='error';
  }
  if($('#name').val() == ''){
    $('#name').css('border-color','red');
    $('#name').effect("shake", {times:4,distance:2}, 500);
    status='error';
  }
  if($('#price').val().length>=7){
    $('#price').css('border-color','red');
    $('#price').effect("shake", {times:4,distance:2}, 500);
    status='error';
  }
  if($('#price').val() == ''){
    $('#price').css('border-color','red');
    $('#price').effect("shake", {times:4,distance:2}, 500);
    status='error';
  }
  if($('#description').val() == ''){
    $('#description').css('border-color','red');
    $('#description').effect("shake", {times:4,distance:2}, 500);
    status='error';
  }



  if(status != 'error'){
    $('#editBtn').click();
  }
  });
</script>
@endsection