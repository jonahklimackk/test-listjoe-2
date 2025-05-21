<html>
<head>
</head>
<body>


	<table width="600"  align="center">
		<tr>

			<td>
				<table>
					<tr>
						<td>
							<div style="margin-right: 10px;float:left;">
								<div style="border-radius: 100px;margin: 5px;overflow: hidden;">
									<a href="{{ config('listjoe.email_url') }}/members/profile/u/{{ $sender->username }}">

										<?php
										$post = App\Models\Post::where('user_id', $sender->id)->get()->first();
										?>

										@if(!is_null($post))
										<img src="{{$post->getFirstMediaUrl('images', 'thumb')}}" width='100' height='100' class='photo'/>
										@else
										<img src='{{ $sender->profile_photo_url }}' width='100' height='100' class='photo'/>
										@endif 
									</a>
								</div>
							</div>
						</td>

						{{-- colleague message --}}
						<td style="font-weight: bold;line-height: 20px;color: #222;margin: 6px 30px 0 0;float:left;font-size: 14px;width: 270px;">
							This is a message from 
							<span style="color:#D94C55;font-size: 17px;">{{ $sender->name }}</span>
							a colleague at Listjoe.com.
							See below for subscription information and to remove.
						</td>
					</tr>
					<tr>
						<td>
							{{-- twitter --}}
							<!-- <a href="http://www.x.com/jonahklimack" target="_blank"><img src="/img/x.png" height="24px" width="24px" style="margin-right: 5px;"/></a> -->
							{{-- facebook --}}
							<!-- <a href="https://www.facebook.com/listjoecom" target="_blank"><img src="/img/f.png" height="24px" width="24px" style="margin-right: 5px;"/></a> -->
							{{-- skype --}}
							<!-- <a href="https://www.facebook.com/listjoecom" target="_blank"><img src="/img/s.png" height="24px" width="24px" style="margin-right: 5px;"/></a> -->
						</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</td>


			{{-- top email ad --}}
			<td>

				@if($sender->membership == 'free')
<!-- 				<span style="background: #ffee9e;width: 160px;float: left;margin: -40px 0px 0px 0px;padding: 2px 10px 10px;font-weight: bold;text-shadow: white 0 1px;cursor: pointer;
				">
				<div class="title">{{ $topEmailAd[0]->headline ?? '' }}<br>
					<span>{{ $topEmailAd[0]->body1 ?? ''}}</span><br>
					<span>{{ $topEmailAd[0]->body2 ?? '' }}</span>
					<span>
						<a href="{{ config('listjoe.email_url') }}/record/{{ $topEmailAd[0]->id ?? ''}}/click" target="_blank"> {{ $topEmailAd[0]->url ?? ''}}</a>
					</span>
				</span>  -->
				@endif
			</td>
		</tr>
	</table>






	{{-- The actual message --}}
	<table width="600" align="center">
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">

				<br><br>

			 {!! nl2br($mailing->body) !!}

				<br><br>
 				<br>
<!-- 				Sender Id: {{ $sender->id }}<br>
				Sender Name: {{ $sender->name }}<br>
				Sender Email:{{ $sender->email }}<br>
				Sender Sponsor {{ $sender->sponsor_id }}<br>
				<br><br>

				recipient Id: {{ $recipient->id }}<br>
				recipient Name: {{ $recipient->name }}<br>
				recipient Email:{{ $recipient->email }}<br>
				recipient Sponsor {{ $recipient->sponsor_id }}<br> -->
				<br><br><br>
			</td>
		</tr>
	</table>





	{{-- click to earn credits--}}
	<table width="600" align="center">
		<tr>
			<td>
				<div style="text-align: center">
					<a href="{{ config('listjoe.email_url') }}{{ $creditsUrl }}" style="background: #FFEE9E;
					display: inline-block;
					margin: 0 auto;
					color: #0052AA;
					padding: 10px 20px;
					border-radius: 20px;
					font-weight: bold;
					font-size: 18px;
					text-shadow: white 0 1px;">
					Click Here to View Website and earn Credits!
				</a>
			</div>
		</td>
	</tr>
</table>



<br/>
<hr/>
<br/>






{{-- the message footer, unsubcribe links ,etc --}}
<table width="600" align="center">
	<tr>
		<td width="300" style="font-size: 12px;">
			<b>Report Ad</b>
			<br>
			We are not responsible for false or misleading information sent from other members.
			We recommend you investigate all offers thoroughly before making any purchase decisions.

			<br><b>Report Ad</b><br/>
			for inappropriate content
			<a href="mailto:support@listjoe.com?subject=FW:%20Inappropr    iate%20Email&body=This%20email%20with%20id%206f431a093bc22dc8bd1e687b9e42    8e57%20is%20inappropriate%20or%20breaks%20frames.">support@listjoe.com</a>
		</td>

		{{-- spacer --}}
		<td  width="200">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>

		<td  width="300" style="font-size: 12px;">
			You received this email because you are a member at ListJoe.com.
			<br><br>
			You joined on {{ $recipient->created_at }} and confirmed your email address: {{ $recipient->email }}.
			<br>

			<?php
			$login = App\Models\Logins::where('user_id',$recipient->id)->get()->sortByDesc('updated_at')->first();
			?>

			@if(! is_null($login))
			The ip address: {{ $login->ip ?? '' }} was recorded.
			
			<br/>
			You last login date was on {{ $login->updated_at ?? '' }} with ip address:    {{ $login->ip ?? '' }}
			@endif
			<br/><br/>

			<a href="{{ config('listjoe.email_url') }}/unsubscribe/u/jonahslistbuilders">Unsubscribe</a>
		</td>
	</tr>
</table>

<br/><br/>




{{-- copyright --}}
<table width="600" align="center">
	<tr>
		<td style="text-align: center;clear: both;font-size: 12px;">
			© 2024
		</td>
	</tr>
</table>


{{--tracking open rates --}}
<table width="600" align="center">
	<tr>
		<td>
			<!-- record views to the email -->
			<img src="{{ config('listjoe.email_url') }}/record{{ $creditsUrl }}/view">
			@if($sender->membership == 'free')
			<img src="{{ config('listjoe.email_url') }}/record/tea/{{ $topEmailAd->id ?? 0 }}/view">
			@endif
		</td>
	</tr>
</table>

</body>
</html>