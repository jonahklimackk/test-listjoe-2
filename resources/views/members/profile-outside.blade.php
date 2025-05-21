@extends('members.layout.sales-header')

@section('content')

@include('members.profile-styles')


<?php
$post = App\Models\Post::where('user_id', $profileUser->id)->get()->first();
?>

<div class="profile_page">
  <div class="description" style="margin: 14px 0 30px 6px;">
    <h1 style="padding: 3px 28px;margin-left: 12px;">Profile</h1>
    <div class="info">
      <div class="left">
        @if(!is_null($post))
        <a href='/members/profile/u/{{ $profileUser->username }}'>
          <img src="{{ $post->getFirstMediaUrl('images', 'thumb')}}" width='135' height='135' class='photo'/>
        </a>
        @else
        <img src='{{ $message->user->profile_photo_url }}' width='135' height='135' class='photo'/>
        @endif

        <div class="socnet">

          @if(isset($profileUser->social))
          <a href=
          "http://www.twitter.com/{{ $profileUser->social->twitter }}" target="_blank">
          <div class="t"></div>
        </a>

        <a href="http://www.facebook.com/{{ $profileUser->social->facebook }}" target="_blank">
          <div class="f"></div>
        </a>

        <a href="http://www.skype.com/{{ $profileUser->social->skype }}" target="_blank">
          <div class="s"></div>
        </a>
        @endif



      </div>
    </div>

    <div class="stat">
      <div class="name">
       {{ $profileUser->name  }}
     </div>
     <div class="line">
      <b>Joined: </b>{{ $profileUser->created_at->toFormattedDateString() }}              </div>

      <div class="line">
        <b>Rating: </b>
        <br>
      </div>
      <div class="rating line">
        <div class="value">
          {{ $profileUser->getRating() }}%
        </div>
        <div class="arrow" style="margin-left:{{ $profileUser->getRating() }}px"></div>
      </div>


      <div class="line">
        <b>Referrals: </b>
        {{ App\Helpers\Downline::getCount($profileUser) }}
      </div>
    </div>

    <div class="downline">
      <div class="title"></div>
      @foreach($referrals as $referral)
      <?php
      $post = App\Models\Post::where('user_id', $referral->id)->get()->first();
      ?>
      @if(!is_null($post))
      <a href="/members/profile/u/{{ $referral->username }}">
        <img src="{{$post->getFirstMediaUrl('images', 'thumb')}}" height="50" width="50"/>
      </a>
      @else
      <a href="/members/profile/u/{{ $referral->username }}">
        <img src="{{ $referral->profile_photo_url }}" height="50" width="50"/>
        @endif
        @endforeach
      </div>

    </div>



    @include('members.profile-messages')
  </div>
</div>

@include('members.profile-scripts')






@endsection