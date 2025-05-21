@include('members.layout.header')


{{-- <div class="wrapper"> --}}
	<br>

	<div align="center">
		<div class="description">
			<h1 style="padding: 3px 20px;">Wait! Before You Continue...</h1>
			<div class="par">{{ ucfirst($loginAd->user->name) }} created a special time limited offer for you... <br></div>



			<a href='/members/profile/u{{ $loginAd->user->username}}'>
				<img src='{{ $loginAd->user->profile_photo_url }}' width='40' height='40' class='photo'/>
			</a>
			<div class="info">
				<a href="/members/profile/u/{{ $loginAd->user->username }}" class="name">
					{{ $loginAd->user->name }}</a>
					<img class="star" src="/img/spotlights_ads_star.png"/>
					<div class="rating">Joe Rating: {{ $loginAd->user->getRating() }}%</div>
				</div>

				<div class="spotlights_side" style="width: 520px">
					<div class="ad" style="width: 500px; min-height: 500px; text-align: left">

						<div class="description" style="text-align: center; text-size: 36px;width: 480px">
							<b><h4>{{ $loginAd->headline }}</b></h4>
						</div>

						<div class="description" style="width:480px;">
							{!! nl2br($loginAd->body) !!}
						</div>
						<br><br>

						<div  align="center">
							<h1>
								<a href="{{ config('listjoe.backend_ad_url') }}la/{{ $loginAd->id }}" target="_blank">
									{{ parse_url($loginAd->url, PHP_URL_HOST) }}
								</a>
							</h1>
							<br><br>
						</div>
					</div>
				</div>
				<br><br>
				<br><br>


    <div style="text-align: center">
    <div class="blue_button" onclick="window.close()">Go Back And Save Login Ad!</div>
  </div>


			</div>


