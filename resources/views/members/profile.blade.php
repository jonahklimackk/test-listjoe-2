@extends('members.layout.sales-header')

@section('content')

@include('members.layout.sales-menu')
@include('members.profile-styles')

<?php
$post = App\Models\Post::where('user_id', Auth::user()->id)->get()->first();
?>

<div class="menu_button">
  MENU
  <div class="down"></div>
</div>
<div class="profile_page">
  <div class="description" style="margin: 14px 0 30px 6px;">
    <h1 style="padding: 3px 28px;margin-left: 12px;">Profile</h1>
    <div class="info">
      <div class="left">
        <a href="{{ config('listjoe.member_profile') }}{{ Auth::user()->username }}">
          @if(!is_null($post))
          <img src="{{$post->getFirstMediaUrl('images', 'thumb')}}" width='135' height='135' class='photo'/>
          @else
          <img src='{{ $message->user->profile_photo_url }}' width='135' height='135' class='photo'/>
          @endif 
        </a>

        <div class="socnet">

          @if(isset(Auth::user()->social))
          <a href="http://www.twitter.com/{{ Auth::user()->social->twitter }}" target="_blank">
            <div class="t"></div>
          </a>

          <a href="http://www.facebook.com/{{ Auth::user()->social->facebook }}" target="_blank">
            <div class="f"></div>
          </a>

          <a href="http://www.skype.com/{{ Auth::user()->social->skype }}" target="_blank">
            <div class="s"></div>
          </a>
          @endif
        </div>
      </div>

      <div class="stat">
        <div class="name">
         {{ Auth::user()->name  }}
       </div>
       <div class="line">
        <b>Joined: </b>
        {{ Auth::user()->created_at->toFormattedDateString() }}              
      </div>

      <div class="line">
        <b>Rating: </b>
        <br>
      </div>
      <div class="rating line">
        <div class="value">
          {{ Auth::user()->getRating() }}%
        </div>
        <div class="arrow" style="margin-left:{{ Auth::user()->getRating() }}px"></div>
      </div>

      <div class="line">
        <b>Referrals: </b>
        {{ App\Helpers\Downline::getCount(Auth::user()) }}
      </div>
    </div>

    <div class="downline">
      <div class="title"></div>
      @foreach($referrals as $referral)
      <a href="{{ config('listjoe.member_profile') }}{{ $referral->username }}">
        <img src="{{ $referral->profile_photo_url }}" class="photo" title="{{ $referral->name }}"/>
      </a>
      @endforeach
    </div>

  </div>



  @include('members.profile-messages')
</div>
</div>

@include('members.profile-scripts')



@endsection