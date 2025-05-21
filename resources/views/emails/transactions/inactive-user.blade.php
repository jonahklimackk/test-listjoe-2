@include('emails.layouts.header')


	<table width="600" align="center">
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">

		<p><h1>You Have {{ $recipient->credits }} Unused Credits!!</h1></p>




<p>Hi {{ $recipient->name }}/</p>

<p>I was just looking through my stats and I noticed that you haven't send out a 
mailing, but you have {{ $recipient->credits }} credits.</p>


<p>Here is an opportunity to get some real live traffic to your website.</p>

<p><b>The best performing ad sent out to 500 people was 343 opens and 126 visitors</b></p>

<p>Yes we can track open rates too.

Who knows, if you get that traffic to your site how many would join your offer.</p>

<p>And this is all free, takes minutes to do.</p>

<p>I just wanted to make sure you gave us a try so that's why
I'm sending you this email.</p>


<p>
<a href="{{ config('listjoe.email_url') }}/sendmail">
	You can send your ad right from here
</a>
</p>




		<p>regards,<br>
		Jonah Klimack<br>
		Listjoe
</p>
P.S.  If you like the results consider upgrading. With a bronze membership
you can email to 500 people every 3 days. There's a 50 percent off sale
right now - just $13.50 a month. 


<div align="center"><b><a href="{{ config('listjoe.email_url') }}/members/upgrade">Click Here to upgrade</a></b></div>

			</td>
		</tr>
	</table>







<br/>
<hr/>
<br/>





@include('emails.layouts.footer')