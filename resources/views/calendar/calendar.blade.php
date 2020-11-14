@extends('layouts.mainlayout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/pages/calendar.css') }}" />
@endsection

<?php
function showEvents($tutorEvent,$day,$choosedMonth,$choosedYear){
            $dateStart = \Carbon\Carbon::parse($tutorEvent->start);
          $dateEnd = \Carbon\Carbon::parse($tutorEvent->end);
          if($dateStart->day== $day && $dateStart->month == $choosedMonth && $dateStart->year == $choosedYear){
          echo ' <p class="event-in-card card-text row">';
          echo $dateStart->hour.':';
          if($dateStart->minute==$day){
            echo '00';
          }else{
            echo $dateStart->minute;
          }
          echo '-';
          echo $dateEnd->hour.':';
          if($dateEnd->minute==0){
            echo '00';
          }else{
            echo $dateEnd->minute;
          }
          echo " ".$tutorEvent->name;
          echo " ".$tutorEvent->language;
          echo '</p>';
          }else{
            echo ' <p style="font-size:10px;"class="card-text row">';
            echo '</p>';

          }

}
?>
@section('content')
@include('errorMessage');

<div class="add-event-container container">
  <div class="row">
    <span class="add-event-span">Add Event</span>
  </div>
  {!! Form::open(['action'=>'CalendarController@store','method'=>'POST','style'=>'width:100%;']) !!}
  <div class="row">
    <div class="col-md-2 col-xl-2">
      {{Form::label('email','Email')}}
      {{Form::text('email','',['class'=>'form-control','style'=>'font-size: 18px;'])}}
    </div>
    <div class="col-md-2 col-xl-2">
      {{Form::label('language','Język')}}
      {{Form::text('language','',['class'=>'form-control','list'=>'languageList','style'=>'font-size: 18px;'])}}
    </div>
    <div class="col-md-2 col-xl-2">
      {{Form::label('platform','Platforma')}}
      {{Form::text('platform','',['class'=>'form-control','list'=>'','style'=>'font-size: 18px;'])}}
    </div>
  </div>
  <div class="row">

    <div class="col-md-3 col-xl-3">
      {{Form::label('start','Początek zajęć')}}
      <div class="input-group date" id='datetimepicker1' data-target-input="nearest">
        {{Form::text('start','',['class'=>'form-control datetimepicker-input','style'=>'font-size: 18px;','data-target'=>'#datetimepicker1'])}}
        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-xl-3">
      {{Form::label('end','Początek zajęć')}}
      <div class="input-group date" id='datetimepicker2' data-target-input="nearest">
        {{Form::text('end','',['class'=>'form-control datetimepicker-input','style'=>'font-size: 18px;','data-target'=>'#datetimepicker2'])}}
        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>


    <div class="col-md-2 col-xl-2">
      {{FORM::submit('Zapisz',['class'=>'btn btn-primary','style'=>'font-size: 18px;margin-top:31px;'])}}

    </div>
    {!! Form::close() !!}
  </div>
  <div class="row">
    <br>
  </div>
</div>
<div class="choose-date-container container" style="margin-top:15px;">
  <div class="row">
    <span class="choose-date-span">Choose Date</span>
  </div>
  <div class="row">
    <div class="col-md-1 col-xl-1">
      <label style="font-size:10px;" for="choosedMonth"> Choose month</label>
      <input style="width:100px;font-size:15px;" id="choosedMonth" name="choosedMonth" list="months"
        class="form-control" type="text" value="{{$choosedMonth}}">
    </div>
    <div class="col-md-1 col-xl-1">
      <label style="font-size:10px;" for="choosedYear">Choose year</label>
      <input style="width:100px;font-size:15px;" id="choosedYear" list="years" name="choosedYear" class="form-control"
        type="text" value="{{$choosedYear}}">

    </div>
    <div class="col-md-4 col-xl-4">

    </div>
  </div>
</div>
<div class="container">
  <div class="row table-row" style="margin-top:20px;">

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">1/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,1,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,1,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">2/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,2,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,2,$choosedMonth,$choosedYear)
              ?>
          @endforeach

        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">3/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,3,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,3,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">4/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,4,$choosedMonth,$choosedYear)
                ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,4,$choosedMonth,$choosedYear)
                ?>
          @endforeach
        </div>
      </div>
    </div>

  </div>

  <div class="row table-row" style="margin-top:20px;">

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">5/{{$choosedMonth}}/{{$choosedYear}}</h5>
          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,5,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,5,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">6/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,6,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,6,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">7/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,7,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,7,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">8/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,8,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,8,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="row table-row" style="margin-top:20px;">

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">9/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,9,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,9,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">10/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,10,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,10,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">11/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,11,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,11,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">12/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,12,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,12,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="row table-row" style="margin-top:20px;">

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">13/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,13,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,13,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">14/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,14,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,14,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">15/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,15,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,15,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">16/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,16,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,16,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="row table-row" style="margin-top:20px;">

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">17/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,17,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,17,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">18/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,18,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,18,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">19/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,19,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,19,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">20/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,20,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,20,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="row table-row" style="margin-top:20px;">

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">21/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,21,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,21,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">22/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,22,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,22,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">23/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,23,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,23,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">24/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,24,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,24,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="row table-row" style="margin-top:20px;">

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">25/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,25,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,25,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">26/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,26,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,26,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">27/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,27,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,27,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">28/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,28,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,28,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="row table-row" style="margin-top:20px;">

    @if ($numberOfDays>28)

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">29/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,29,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,29,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    @endif

    @if ($numberOfDays>29)

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">30/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,30,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,30,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    @endif

    @if ($numberOfDays>30)

    <div class="col-lg-3 col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center;">31/{{$choosedMonth}}/{{$choosedYear}}</h5>

          @foreach ($tutorEvents as $tutorEvent)
          <?php
                showEvents($tutorEvent,31,$choosedMonth,$choosedYear)
              ?>
          @endforeach
          @foreach ($studentEvents as $studentEvent)
          <?php
                showEvents($studentEvent,31,$choosedMonth,$choosedYear)
              ?>
          @endforeach
        </div>
      </div>
    </div>
    @endif
  </div>



</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(function () {
                $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
                });
            });
                  $(function () {
                $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
                });
            });

        $("#choosedYear").change(function(){
          var month = $('#choosedMonth').val();
          var year = $('#choosedYear').val();
            window.location = "http://localhost:8000/calendar/"+month+ "/"+year

});
        $("#choosedMonth").change(function(){

          var month = $('#choosedMonth').val();
          var year = $('#choosedYear').val();

          window.location = "http://localhost:8000/calendar/"+month+ "/"+year

});
</script>
<datalist id="languageList">
  <option value="Arabski">
  <option value="Bułgarski">
  <option value="Kambodżański">
  <option value="Chiński">
  <option value="Chorwacki">
  <option value="Czeski">
  <option value="Duński">
  <option value="Angielski">
  <option value="Estoński">
  <option value="Fiński">
  <option value="Francuski">
  <option value="Gruziński">
  <option value="Niemiecki">
  <option value="Grecki">
  <option value="Hinduski">
  <option value="Węgierski">
  <option value="Islandzki">
  <option value="Irlandzki">
  <option value="Włoski">
  <option value="Japoński">
  <option value="Koreański">
  <option value="Łotewski">
  <option value="Litewski">
  <option value="Mongolski">
  <option value="Norweski">
  <option value="Polski">
  <option value="Portugalski">
  <option value="Rumuński">
  <option value="Rosyjski">
  <option value="Serbski">
  <option value="Słowacki">
  <option value="Hiszpański">
  <option value="Szwedzki">
  <option value="Tajski">
  <option value="Turecki">
  <option value="Ukraiński">
  <option value="Wietnamski">
</datalist>

<datalist id="months">
  <option value="1">
  <option value="2">
  <option value="3">
  <option value="4">
  <option value="5">
  <option value="6">
  <option value="7">
  <option value="8">
  <option value="9">
  <option value="10">
  <option value="11">
  <option value="12">
</datalist>
<datalist id="years">
  <option value="2020">
  <option value="2021">
  <option value="2022">
  <option value="2023">
  <option value="2024">
  <option value="2025">
  <option value="2026">
  <option value="2027">
</datalist>
@endsection