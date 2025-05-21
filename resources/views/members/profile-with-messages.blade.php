
<div class="messages">
  <div class="title"></div>

  {{-- LOOP THROUGH MESSAGES --}}
  @foreach($messages as $message)

  {{-- white bg for replies --}}
  @if($message->tab_width > 10)
  <div class="message" data-id="{{ $message->id }}"
    style="background: white;margin-left:{{ $message->tab_width }}px">
  @else
  <div class="message" data-id="{{ $message->id }}"
    style="margin-left:{{ $message->tab_width }}px">
    @endif

    <div class="left">
      <div class="name">
        {{ $message->user->name }}
      </div>
      <div class="avatar">
        <a href='{{ config('listjoe.member_profile') }}{{ $message->user->username }}'>
<?php
$post = App\Models\Post::where('user_id', $message->user->id)->get()->first();
?>
          @if(!is_null($post))
          <img src="{{$post->getFirstMediaUrl('images', 'thumb')}}" width='50' height='50' class='photo'/>
          @else
          <img src='{{ $message->user->profile_photo_url }}' width='37' height='37' class='photo'/>
          @endif


        </a>
      </div>
    </div>
    <div class="right">
      <div class="time">
        {{ $message->created_at->toFormattedDateString()  }}
      </div>
      <div class="text">
        {{ $message->body }}
      </div>
    </div>

    {{-- The Reply/Delete links --}}
    @if (Request::path() == 'members/profile' || isset($profileUser) && (Request::path() == 'members/profile/u/'.$profileUser->username && $profileUser->id == Auth::user()->id))
    <div class="remove">Remove</div>
    <div class="reply" onclick="repliedTo({{ $message->id }}, {{ $message->tab_width }})">Reply</div>
    @endif
  </div>
  @endforeach


  {{-- With Messages --}}
  {{-- Visiting your own profile (show only the reply form) --}}
    @if (Request::path() == 'members/profile' || isset($profileUser) && (Request::path() == 'members/profile/u/'.$profileUser->username && $profileUser->id == Auth::user()->id))
  <form class="send_message" method="post" style="display: none">

    {{-- Or, show the standard message form (for outside visitors to your profile) --}}
    @else
    <form class="send_message" method="post">
      @endif

      @csrf
      <input type="hidden" name="answer_id" value="0">
      <input type="hidden" name="tab_width" value="10">
      <textarea name="message"></textarea>
      <br/><br/>
      <div style="text-align: center">
        <div class="blue_button" id="sendMessagePublic">
          <b>Send</b>
        </div>
        <div class="blue_button"  id="sendMessagePrivately">
          <b>Send Privately</b>
        </div>
      </div>
      <br/>
    </form>
  </div>



