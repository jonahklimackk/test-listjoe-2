@include('members.layout.header')





	<div align="center">


<!-- <h1 style="padding: 3px 20px; color:blue;">{{ $message ?? '' }}</h1> -->

		<div class="description">
			<h1 style="padding: 3px 20px;">Wait! Before You Login...</h1>
			<div class="par">{{ ucfirst($loginAd->user->name) }} created a special time limited offer for you... <br></div>


<div style="font-family: arial;width: 820px;">
  <!-- <a href="/"><img src="/img/mail_head.png"/></a> -->
  <div style="position: relative;width: 270px;margin: 0 auto;overflow: hidden">
    <div style="margin-right: 10px;float:left;">
      <div style="border-radius: 100px;margin: 5px;overflow: hidden;">
        <a href='/members/profile/u/{{ $loginAd->user->username }}'>
          <img src='{{ $loginAd->user->profile_photo_url }}' width='100' height='100' class='photo'/>
        </a>
    </div>


    </div>
    <div style="font-weight: bold;line-height: 20px;color: #222;margin: 6px 30px 0 0;font-size: 14px;width: 270px;">
      <br/>
      <span style="color:#D94C55;font-size: 17px;">{{ $loginAd->user->name }}</span><br/>
Joe Rating:
{{ $loginAd->user->getRating() }}%<br>
Status: {{ $loginAd->user->membership }}
    </div>
</div>

{{-- <div class="wrapper"> --}}

				<div class="spotlights_side" style="width: 520px">
					<div class="ad" style="width: 500px;  text-align: left">

						<div class="description" style="text-align: center; text-size: 100px;width: 480px display: flex;">
							<b><h4>{{ $loginAd->headline }}</b></h4>
						</div>

						<div class="description" style="width:480px;">
							{!! $loginAd->body !!}
						</div>
						<br><br>

						<div  align="center">
							<h1>
								<a href="/members/la/{{ $loginAd->id }}" target="_blank">
									{{ parse_url($loginAd->url, PHP_URL_HOST) }}
								</a>
							</h1>
							<br><br>
						</div>
					</div>
				</div>
				<br><br>
				<br><br>

								<!-- <div class="ad" style="width: 250px; font-size: 12px">
					<a href="/members/loginad"><b>Earn from {{ config('listjoe.lower_credits_bound')}} to {{ config('listjoe.upper_credits_bound')}} for clicking on
					these login ads! Load more login ads...</a>
				</div> -->
<br><br>
				<div class="ad" style="width: 250px; font-size: 12px">
					<a href="/members">No thanks, take me to member's area...</a>
				</div>

			</div>


<br><br>