
@include('emails.layouts.header')

    {{-- The actual message --}}
    <table width="600" align="center">
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">

        <p><h2>Congratulations!</h2></p>


<p>
    <b>{{ $customer->name }} {{ $customer->email }} just ordered the {{ $subscriptionOrder->name }} subscription for ${{ $subscriptionOrder->price }} </b>
</p>
<p> If you are a gold member you're getting 50% for this order. However if you are not, you're missing out!</p>

<p>Free members earn 15%, bronze get 25%, silver gets 35% and gold earns 50% on each order</p>

<p>So if you're a free member now, and upgrade, you will be earning 50% on this commission. But you have to do it fast because I may change this feature.

<p>If you haven't yet upgraded you're not getting 50% on this or future orders
    by any of your referrals.</p>    

    <p><a href="{{ config('listjoe.email_url') }}/members/earnings">Check your statistics to see how much commission you earned.</a></p>

<p> It's not too late, you can upgrade and the commission you earn will change to the new upgraded commission. If you buy gold, you'll get 50%. </p>

<p><b>All you need is one or two and the service is free for you.</b>


<div align="center">
    <p><h2><a href="{{ config('listjoe.email_url' )}}/members/upgrade">Recommended by every top mailer out there, upgrade to Listjoe right now and send your mailing</a></h2></p></div>

<br>
    <p>Best of luck in your promotions,<br>
        Jonah Klimack, <br> 
        Founder, <br>
        Listjoe
    </p>
    <p> P.S. You may still have time to upgrade and get 50% commission. Check your stats and see how much commission you're getting now vs if you upgrade.
        <a href="{{ config('listjoe.email_url') }}/members/earnings"> stats </a></p>

<p><b><a href="{{ config('listjoe.email_url') }}/members/upgrade">upgrade now</a></p>
            </td>
        </tr>
    </table>







<br/>
<hr/>
<br/>






@include('emails.layouts.footer')