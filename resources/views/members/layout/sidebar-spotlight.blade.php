
<?php
$spotLightAds = App\Models\SpotlightAds::where('user_id','!=',Auth::user()->id)->inRandomOrder()->take(4)->get()->all();
?>
<style>
  .content > .wrapper {
    width: 499px;
  }
</style>

<div class="rsidebar">
  <div class="spotlights_side">
    <img src="/img/spotlights2.png" style="position: absolute;margin-top: -17px;z-index: 10;"/>
    @foreach($spotLightAds as $spotLightAd)

    <?php
    $adUser = App\Models\User::where('id',$spotLightAd->user_id)->get()->first();
    ?>
      {{ App\Models\SpotLightAds::recordView($spotLightAd) }}
    <div class="ad">
      <a href='{{ $spotLightAd->url }}'>
        <img src='{{ $adUser->profile_photo_url }}' width='40' height='40' class='photo'/>
      </a>
      <div class="info">
        <a href="/members/profile/u/{{ $adUser->username }}" class="name">
          {{ $adUser->name }}
        </a>

        <div class="rating">
          Joe Rating: {{ $adUser->getRating() }}%
        </div>
      </div>
      <div class="title">
        {{ $spotLightAd->headline }}
      </div>
      <div class="text">
        {{ $spotLightAd->body1 }}
      </div>
      <div class="text">
        {{ $spotLightAd->body2 }}
      </div>
      <div class="href">
        <a href="/members/spot/{{ $spotLightAd->id }}" target="_blank">
          {{ parse_url($spotLightAd->url, PHP_URL_HOST) }}
        </a>
      </div>
    </div>
    @endforeach
  </div>
</div>