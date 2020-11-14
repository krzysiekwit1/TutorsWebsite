@extends('layouts.mainlayout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/pages/userPanel.css') }}" />
@endsection
@include('errormessage');
@section('content')
<div class="container">
  <div class="row">
    <div class="information col-md-4 col-xl-4">
      <div class="row">
        <img id="avatarImage" class="avatar-image" src="{{asset('/'.$user->avatar)}}" alt=" logo">
      </div>
      <div class="row">
        <form action="/userpanel" enctype="multipart/form-data" method="POST" style="display:block;margin:auto;">
          @csrf
          <input name="avatar" id="avatarInput" type="file" class="avatar-input" title=" " value="">
          <div class="row">
            <p id="avatarInputP">
              Choose Photo
            </p>
          </div>
          <div style="margin-top:0px;" class="row">
            <input value="Update" type="submit" class="avatar-button btn btn-sm">
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-8 col-xl-8">
      <div class="personal-information row">
        <div class="information col-md-4 col-xl-4">
          Name:
        </div>
        <div class="informationInput col-md-8 col-xl-8">
          <p>{{$user->name}}</p>
        </div>
        <div class="information col-md-4 col-xl-4">
          Email:
        </div>
        <div class="informationInput col-md-8 col-xl-8">
          <p>{{$user->email}}</p>
        </div>
      </div>
      <div class="row">
        <div id="isTutorInformation" class="information col-md-4 col-xl-4">
          Are you a Tutor:
        </div>
        <div class="col-md-8 col-xl-8">
          <form id="isTutorForm" action="">
            @csrf
            <div class="row">
              <div class="col-md-8 col-xl-8">
                <div class="isTutorElementsContainer row" style="margin-top:0px;">
                  <label class="switch">
                    <input name="isTutorCheckbox" id="isTutorCheckBox" type="checkbox" @if ($user->is_tutor==1)
                    {{'checked'}}
                    @endif>
                    <span class="slider round"></span>
                  </label>
                  <div id="isTutorLoading" class="loading-dual-ring"></div>
                  <div id="isTutorSuccess" class="isTutorSuccess">Done!</div>
                  <div id="isTutorError" class="isTutorError">Error</div>
                </div>
              </div>
              <div class="col-md-4 col-xl-4">
                <input value="Update" type="button" class="update-button btn btn-sm" id="isTutorButton">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div id="birthDateInformation" class="information col-md-4 col-xl-4">
          Birth Date:
        </div>
        <div class="col-md-8 col-xl-8">
          <form action="">
            <div class="row">
              <div class="col-md-8 col-xl-8">
                <div class="birthDateElementsContainer">
                  <div style="margin-top:0px;" class="row">
                    <input id="birthDateInput" type="date" @if ($user->birth_date != NULL)
                    {{'value = '. $user->birth_date}}
                    @endif>
                    <div id="birthDateLoading" class="loading-dual-ring"></div>
                    <div id="birthDateSuccess" class="isTutorSuccess">Done!</div>
                    <div id="birthDateError" class="isTutorError">Error</div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-xl-4">
                <input value="Update" type="button" class="update-button btn btn-sm" id="birthDateButton">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>






</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  //emulate click on hidden input
  $('#avatarInputP').click( function(){
    $('#avatarInput').click();
  });
// storing photo and replace with existing on page
  function readURL(input) {
      if (input.files && input.files[0]) {
      var reader = new FileReader();

    reader.onload = function(e) 
      {
        $('#avatarImage').attr('src', e.target.result);
      }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#avatarInput").change(function() {
    readURL(this);
  });
// tutor status update
$('#isTutorButton').click( function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
//Apearing loading icon on sending the is_tutor status
  $("#isTutorLoading").css("display", "block");
//getting the checkbox value
if(document.getElementById('isTutorCheckBox').checked) 
  {
    var data ={
    'checkBoxValue':1
  };
    }else {
      var data ={
      'checkBoxValue':0
    };
    }
//Ajax post
$.ajax({
  type: "POST",
  url: '/profile/istutorupdate',
  data: data,
  success: successFunc,
  error: errorFunc
});
//function on ajax succes
function successFunc(result)
  {
    console.log(result);
    $("#isTutorLoading").css("display", "none");
    $("#isTutorSuccess").show(0).delay(3000).hide(0);
  }
  //function oj ajax error
function errorFunc() 
  {
    $("#isTutorError").css("display", "block");      
  }

});
//-------------------------------------------
//Birth date update
function successFunc(result)
{
$("#birthDateLoading").css("display", "none");
$("#birthDateSuccess").show(0).delay(3000).hide(0);
}
function errorFunc()
{
  $("#birthDateLoading").css("display", "none");
$("#birthDateError").show(0).delay(3000).hide(0);
}

$('#birthDateButton').click( function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
//Apearing loading icon on sending the is_tutor status
$("#birthDateLoading").css("display", "block");
//getting the birth date input value
var minimumDate = new Date(1940,01,01);
var maximumDate = new Date();

var birthDateValue = $('#birthDateInput').val();
var birthDateValueConverted = new Date(birthDateValue);
if(minimumDate<birthDateValueConverted && maximumDate>birthDateValueConverted){

var data ={
'birthDate': birthDateValue
};
console.log(data);
//Ajax post
$.ajax({
type: "POST",
url: '/profile/birthdateupdate',
data: data,
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
error: errorFunc,
});
//function on ajax succes
//function oj ajax error

}else{
errorFunc();
}
});


</script>
@endsection