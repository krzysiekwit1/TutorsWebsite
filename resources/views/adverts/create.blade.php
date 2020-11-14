@extends('layouts/mainlayout');
<div style="height:5rem;" class="container"></div>
@include('errorMessage');
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('css/advert/edit.css') }}" />
@endsection
@section('content')
{!! Form::open(['action'=>'AdvertsController@store','method'=>'POST','style'=>'width:100%;heiht:50%;']) !!}
<div style='width:100%;height:50%;' class="container col-md-12 col-lg-12 fill">
  <div style="height:100%;" class="row col-md-12 fill">
    <div class="col-md-4 col-lg-4">
      {{Form::label('name','Title,name')}}
      {{Form::text('name','',['class'=>'form-control','style'=>'font-size: 18px;','id'=>'name','placeholder'=>'Prof. Your name'])}}
      {{Form::label('nativ_language_1','Nativ language 1')}}
      {{Form::text('nativ_language_1','',['class'=>'form-control','list'=>'languageList','style'=>'font-size: 18px;','id'=>'nativLanguage1','placeholder'=>'e.g. Polish'])}}
      {{Form::label('nativ_language_2','Nativ Language 2')}}
      {{Form::text('nativ_language_2','',['class'=>'form-control','list'=>'languageList','style'=>'font-size: 18px;','id'=>'nativLanguage2','placeholder'=>'e.g. Polish'])}}
      {{Form::label('price','Price per lessons and currnecy sign')}}
      {{Form::text('price','',['class'=>'form-control','style'=>'font-size: 18px;','id'=>'price','placeholder'=>'e.g. 40$'])}}
      <div class="row"></div>
      <div class="row"></div>
      {{FORM::submit('Submit',['class'=>'btn btn-primary','style'=>'font-size: 18px;','hidden','id'=>'hiddenSubmitBtn'])}}
      <p id="fakeSubmitBtn">Create Advert</p>

    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="form-group col-md-6">
          {{Form::label('language_1','Language 1')}}
          {{Form::text('language_1','',['class'=>'input-lg form-control ','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language1'])}}

        </div>
        <div class="form-group col-md-6">
          {{Form::label('language_level_1','Level')}}
          {{Form::text('language_level_1','',['class'=>'form-control input-lg','list'=>'languageLlevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel1'])}}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          {{Form::label('language_2','Language 2')}}
          {{Form::text('language_2','',['class'=>'form-control input-lg','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language2'])}}

        </div>
        <div class="form-group col-md-6">
          {{Form::label('language_level_2','Level')}}
          {{Form::text('language_level_2','',['class'=>'form-control input-lg','list'=>'languageLlevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel2'])}}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          {{Form::label('language_3','Language 3')}}
          {{Form::text('language_3','',['class'=>'form-control input-lg','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language3'])}}

        </div>
        <div class="form-group col-md-6">
          {{Form::label('language_level_3','Level')}}
          {{Form::text('language_level_3','',['class'=>'form-control input-lg','list'=>'languageLlevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel3'])}}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          {{Form::label('language_4','Language 4')}}
          {{Form::text('language_4','',['class'=>'form-control input-lg','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language4'])}}

        </div>
        <div class="form-group col-md-6">
          {{Form::label('language_level_4','Level')}}
          {{Form::text('language_level_4','',['class'=>'form-control input-lg','list'=>'languageLlevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel4'])}}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          {{Form::label('language_5','Language 5')}}
          {{Form::text('language_5','',['class'=>'form-control','placeholder'=>'e.g. Polish','list'=>'languageList','style'=>'font-size: 18px;','id'=>'language5'])}}

        </div>
        <div class="form-group col-md-6">
          {{Form::label('language_level_5','Level')}}
          {{Form::text('language_level_5','',['class'=>'form-control','list'=>'languageLlevelList','placeholder'=>'e.g. A1','style'=>'font-size: 18px;','id'=>'languageLevel5'])}}
        </div>
      </div>

    </div>
    <div class="col-md-4">
      {{Form::label('description','Description (some words about you)')}}
      {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Description','style'=>'font-size: 18px;'])}}
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
<datalist id="languageLlevelList">
  <option value="A1">
  <option value="A2">
  <option value="B1">
  <option value="B2">
  <option value="C1">
  <option value="C2">
</datalist>
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
    $(element).css('border-color','green');
    return 1;
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
  $('#hiddenSubmitBtn').click();
  }
});
</script>
@endsection