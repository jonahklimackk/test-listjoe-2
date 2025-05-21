

<?php
 $topMemberAds = App\Models\TopMemberAds::where('user_id','!=',Auth::user()->id)->inRandomOrder()->take(2)->get()->all();  
?>
@foreach($topMemberAds as $topMemberAd)
<?php
 $adUser = App\Models\User::where('id',$topMemberAd->user_id)->get()->first();
?>

      {{ App\Models\TopMemberAds::recordView($topMemberAd) }}

<div class="sidebar_vda">
  <div class="head">
    <a href="{{ config('member_profile') }}{{ $adUser->username }}" class="name">
    {{ $adUser->name }}
    </a>
    <div class="rating">
      Joe Rating: {{ $adUser->getRating() }}%
    </div>
  </div>
  <div class="text">
    <div class="title">
      {{ $topMemberAd->headline }}
    </div>
    <div class="desc1">
      {{ $topMemberAd->body1 }}
    </div>
    <div class="desc2">
      {{ $topMemberAd->body2 }}
    </div>
  </div>
  <div class="url">
    <a href="tma/{{ $topMemberAd->id }}" id="url" target="_blank">
      {{ parse_url($topMemberAd->url, PHP_URL_HOST) }}
    </a>
  </div>
</div>
@endforeach




<!-- do not get ready of this if you want to be sane -->
</div>
