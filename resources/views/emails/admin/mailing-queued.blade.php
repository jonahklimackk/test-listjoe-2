


@include('emails.layouts.header')


	{{-- The actual message --}}
	<table width="600" align="center">
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">4
						<p><h1>Someone queued a mailing!</h1></p>

						ID: {{ $sender->id }} <br>						
						Name: {{ $sender->name }} <br>
						Username: {{ $sender->username }} <br>
						Email: {{ $sender->email }} <br>
						Membership: {{ $sender->membership }} <br>


						Recipients: {{ $numRecipients }} <br>
						Subject; {{ $mailing->subject }} <br>
						Body <br>
						{!! $mailing->body !!}


			</td>
		</tr>
	</table>







<br/>
<hr/>
<br/>


</body>
</html>