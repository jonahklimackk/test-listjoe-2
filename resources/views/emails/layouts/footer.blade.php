
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
			<br/>

						<?php
			$login = App\Models\Logins::where('user_id',$recipient->id)->get()->sortByDesc('updated_at')->first();
			?>

			@if(! is_null($login))
			The ip address: {{ $login->ip ?? '' }} was recorded.
			
			<br/>
			You last login date was on {{ $login->updated_at ?? '' }} with ip address:    {{ $login->ip ?? '' }}
			@endif
<br>
<div align="center">
			<a href="{{ config('listjoe.email_url') }}/unsubscribe/u/{{ $recipient->username }}">Unsubscribe</a>
		</div>
		</td>
	</tr>
</table>

<br/><br/>




{{-- copyright --}}
<table width="600" align="center">
	<tr>
		<td style="text-align: center;clear: both;font-size: 12px;">
			© 2024 Listjoe
		</td>
	</tr>
</table>


</body>
</html>