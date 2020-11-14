<div class="messages-wrapper">
 <ul class="messages">
  @foreach ($messages as $message)
  <li class="message clearfix">
   {{-- if message->from == auth id then sent either received --}}
   <div class="{{ ($message->from==Auth::id()) ? 'sent' : 'received' }}">
    <p>{{ $message->message }}</p>
    <p class="date">{{date('d M y, h:i a',strtotime($message->created_at))}}</p>
   </div>
  </li>
  @endforeach
 </ul>

</div>
<div class="input-text">
 <input id="chatInput" type="text" class="text" class="submit">
</div>