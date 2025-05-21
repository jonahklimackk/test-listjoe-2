


@include('emails.layouts.header')


{{-- The actual message --}}
<table width="600" align="center">
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2">

			{{ dump($supportTicket->name) }}

			<br><br>
			{{ dump($supportTicket->email) }}
			<br><br>	
			{{ dump($supportTicket->subject) }}

			<br>
			<br>
			{{ dump($supportTicket->message) }}

			<br><br>

			{{ dump($user) }}





		</td>
	</tr>
</table>







<br/>
<hr/>
<br/>

<!--no need for footer on admin emails-->

</body>
</html>