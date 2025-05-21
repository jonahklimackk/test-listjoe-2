


@include('emails.layouts.header')


	{{-- The actual message --}}
	<table width="600" align="center">
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">4
						<p><h1>Someone quit!</h1></p>


{{ $user->id }} <br>
{{ $user->name }} <br>
{{ $user->username }} <br>
{{ $user->email }} <br>
<br><br>
{{ $feedback->feedback ?? '' }}

			</td>
		</tr>
	</table>







<br/>
<hr/>
<br/>


</body>
</html>