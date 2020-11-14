@include('layouts.mainlayout')
<div style="height:5rem;" class="container"></div>
@include('errorMessage');
@auth

{!! Form::open(['action'=>'MessagesController@store','method'=>'POST','style'=>'width:100%;heiht:50%;']) !!}

<div class="container">
  <div class="row">
    {{ Form::hidden('user_id_2', $user_id_2) }}
    {{Form::label('Wyslij do','Wyślij do')}}
    {{Form::text('Wyslij do',$name,['class'=>'form-control','style'=>'font-size: 18px;','readonly'])}}
  </div>
  <div class="row">
    {{Form::label('title','Tytuł')}}
    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Tytuł','style'=>'font-size: 18px;'])}}
  </div>
  <div class="row">
    {{Form::label('text','Treść wiadomości')}}
    {{Form::textarea('text','',['class'=>'form-control','placeholder'=>'Treść Wiadomości','style'=>'font-size: 18px;'])}}
  </div>
  <div class="row">
    {{FORM::submit('Submit',['class'=>'btn btn-primary','style'=>'font-size: 18px;'])}}

  </div>
</div>



{!! Form::close() !!}
@endauth
@unless (Auth::check())
<h1>NIE JESTEŚ ZALOGOWANY</h1>
@endunless