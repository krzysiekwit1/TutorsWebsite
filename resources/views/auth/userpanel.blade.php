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
        <div class="informationInput col-md-4 col-xl-4">
          <p id="userName">{{$user->name}}</p>
          <input id="userNameInputChange" type="text">

        </div>
        <div class="col-md-4 col-xl-4">
          <div style="margin-top:0px;" class="row">
            <div id="userNameChangeLoading" class="loading-dual-ring"></div>
            <div style="display:none;" id="userNameChangeSuccess" class="isTutorSuccess">Done!
            </div>
            <div style="display:none;" id="userNameChangeError" class="isTutorError">Error</div>

            <input style="margin-left:113px;" value="Change" type="button" class="update-button btn btn-sm float-right"
              id="userNameChangeButton">
            <input style="display:none;margin-left:113px;" value="Accept" type="button"
              class="update-button btn btn-sm " id="userNameChangeAcceptButton">
          </div>

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


      <div class="row">
        <div id="changePasswordInformation" class="information col-md-4 col-xl-4">
          Change your password:
        </div>
        <div class="col-md-8 col-xl-8">
          <form action="">
            <div class="row">
              <div class="col-md-8 col-xl-8">
                <div class="changePasswordElementsContainer">
                  <div style="margin-top:0px;" class="row">
                    <input style="margin-bottom:5px;" id="oldPassword" type="text" placeholder="old password">
                    <input style="margin-bottom:5px;" id="newPassword" type="text" placeholder="new password">
                    <input style="margin-bottom:5px;" id="newPasswordConfirmation" type="text"
                      placeholder="new password">
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-xl-4">
                <input value="Change password" type="button" class="update-button btn btn-sm" id="changePasswordButton">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>






</div>
<div style="margin-top:25px;border-top:solid 1px black;" class="container">
  <p style="margin-left:15px;margin-bottom:15px;">Your Contact list</p>
  <div class="col-xl-12 col-md-12">
    @foreach ($users as $contact)
    <div class="row">
      <div style="height:75px;" class="col-xl-2 col-md-2">
        <img src="{{asset('/'.$contact->avatar)}}" alt="Avatar" style="height:75px;" class="img-fluid">
      </div>
      <div class="col-xl-3 col-md-3">
        <p class="name">{{$contact->name}}</p>
        <p class="email">{{$contact->email}}</p>
      </div>
      <div id="{{$contact->id}}" class="col-xl-3 col-md-3">
        <input value="Contact" type="button" class="contactButton update-button btn btn-sm" id="">
        <input value="Delete" type="button" class="deleteButton update-button btn btn-sm" id="{{$contact->id}}">
      </div>
    </div>
    @endforeach
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $('.contactButton').click(function(){
window.location.href = 'http://localhost:8000/chat';
  });
  //Deleting contact function
  $('.deleteButton').click(function(){
    var Thisdeletebutton = this;
    var id = this.id;
    console.log('id to '+ id);
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    var data ={
    'id':id
    };
    $.ajax({
    type: "POST",
    url: '/profile/deletecontact',
    data: data,
      success: function(data){
      if(data.result=='success'){
        $(Thisdeletebutton).closest(".row").hide();
      };
    },
      error: function(data){
        console.log('contact to administration');
      },
    });
  });
  //firstname and lastname update
$('#userNameChangeButton').click(function(){
$('#userName').hide();
$('#userNameInputChange').show();
  $('#userNameChangeButton').hide();
  $('#userNameChangeAcceptButton').show();
});
$('#userNameChangeAcceptButton').click(function(){
  $('#userNameChangeLoading').show();
$.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });

var userNameNewName = $("#userNameInputChange").val();

var data ={
  'username':userNameNewName
  };

$.ajax({
type: "POST",
url: '/profile/userNameUpdate',
data: data,
success: successFunc,
error: errorFunc
});
//function on ajax succes
function successFunc(result)
  {
    console.log(result.result);

    $('#userNameInputChange').hide();
    $('#userNameInputChange').val('');
    $('#userName').show();
    $('#userName').html(result.result);
    $('#userNameChangeAcceptButton').hide();
    $('#userNameChangeButton').show();
    $("#userNameChangeLoading").css("display", "none");
        $("#userNameChangeSuccess").show(0).delay(3000).hide(0);
  }
//function oj ajax error
function errorFunc()
  {
    ("#userNameChangeError").css("display", "block");
  }

});







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