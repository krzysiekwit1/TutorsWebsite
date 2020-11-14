@extends('layouts.mainlayout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/pages/mailbox.css') }}" />
@endsection
@section('content')


<div style="height:7rem;" class="container"></div>
@auth
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="user-wrapper">
        <ul class="users">
          @foreach ($users as $user)
          <li class="user" id="{{$user->id}}">
            @if ($user->unread)
            <span class="pending">{{$user->unread}}</span>
            @endif
            <div class="media">
              <div class="media-left">
                <img src="{{asset('/'.$user->avatar)}}" alt="" class="media-object">
              </div>
              <div class="media-body">
                <p class="name">{{$user->name}}</p>
                <p class="email">{{$user->email}}</p>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="col-md-8" id="messages">


    </div>
  </div>
</div>


@endsection
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  var receiver_id='';
  var my_id ="{{Auth::id()}}";
  $(document).ready(function(){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
// Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    
    var pusher = new Pusher('127836e025f2ddef8d35', {
    cluster: 'eu',
    forceTLS:true
    });
    
    var channel = pusher.subscribe('TutorsWebsite');
    channel.bind('my-event', function(data) {

      if(my_id == data.from){
        $('#'+data.to).click();
        $("#chatInput").click();
      }else if(my_id == data.to)
        {
        if(receiver_id == data.from)
        {
          //if receiver is selected relad selected user
          $('#' + data.from).click();
        }else
          {
          //if receiver is not selected, add notification to that user
          var pending = parseInt($('#' + data.from).find('.pending').html());
          
          if(pending)
          {
            $('#' + data.from).find('.pending').html(pending + 1);
          }
          else
          {
            $('#' + data.from).append('<span class="pending">1</span>');
          }
        }
      }
//    alert(JSON.stringify(data));
    });
    //end of pusher logs
    $('.user').click(function(){

      $('.user').removeClass('active');
      $(this).addClass('active');
      $(this).find('.pending').remove();
      receiver_id = $(this).attr('id') ;   
      $.ajax({
        type:"get",
        url:("message/"+receiver_id),
        data:"",
        cashe:false,
        success: function(data){
          $('#messages').html(data);
          $('.messages-wrapper').scrollTop($('.messages-wrapper')[0].scrollHeight);
          }
        
      });

      });
      $(document).on('keyup','.input-text input',function (e){
        var message = $(this).val();
        //work on press enter and massage not null and receiver choosed
        if(e.keyCode == 13 && message != '' && receiver_id != ''){
        // empty text box after sending massage
        $(this).val('');
        var datastr = "receiver_id=" + receiver_id +"&message="+message;
        //store data in db
        $.ajax({
          type: "post",
          url: "sendmessage",
          data: datastr,
          cashe:false,
          succes:function(data){
          },
          error:function(jqXHR,status,err){

          },complete:function(){
            $('.messages-wrapper').scrollTop($('.messages-wrapper')[0].scrollHeight);
            }
        });
        }
      });


  });
</script>


@endauth
@unless (Auth::check())
<h1>NIE JESTEŚ ZALOGOWANY</h1>
@endunless