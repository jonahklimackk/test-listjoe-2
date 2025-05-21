  @extends('members.layout.sales-header')


<script src="https://js.stripe.com/v3"></script>
@section('content')



@include('members.layout.sales-menu')





<div class="wrapper">
  <style>
    .sidebar_vda {
      display: none;
    }
    .content > .wrapper {
      margin-left: -19px;
      width: 100%;
    }
    .content > .sidebar {
      margin-top: 31px;
      margin-left: 3px;
      position: absolute;
    }
    .content > .sidebar > .menu {
      background: white;
      display: none;
      box-shadow: gray 0px 0px 22px;
      padding: 3px;
      height: 370px;
    }
    .menu_button {
      color: white;
      font-size: 16px;
      font-family: NewJune-Bold;
      background: #1D70C3;
      position: absolute;
      cursor: pointer;
      left: 0px;
      padding: 9px 145px 6px 11px;
      top: 0px;
      border-radius: 0 0 4px 4px;
    }
    .menu_button > .down {
      background: url('/img/menu_arrow_down.png');
      width: 22px;
      height: 11px;
      position: absolute;
      right: 23px;
      top: 9px;
    }
    .t1, .t2, .t3, .t4, .t5 {
      margin: 0 0 23px 0;
    }
    .t1, .t2, .t4, .t5 {
      color: #1163a0;
      font-weight: bold;
      text-align: center;
    }
    .t1 {
      font-size: 25px;
      margin: 40px 0 0 -32px;
      line-height: 28px;
    }
    .t2 {
      font-size: 18px;
      margin: 14px 0 0 -28px;
    }
    .t4 {
      font-size: 22px;
      margin: 26px 0 0 -40px;
      line-height: 24px;
    }
    .t5 {
      text-align: left;
      font-size: 14px;
      margin: 14px 0 0 27px;
    }
    .t3 {
      font-size: 14px;
      margin: 19px 24px 0;
    }

    .buy_credits {
      background: url('/img/buy_credits.png');
      width: 937px;
      height: 367px;
      margin: 25px 0 0 0;
      font-weight: bold;
      color: #484849;
      font-size: 15px;
      text-align: center;
      vertical-align: middle;
    }
    .cr1, .cr2, .price {
      color: #055d9c;
    }
    .cr1 {
      font-size: 48px;
    }
    .cr2 {
      font-size: 20px;
      line-height: 32px;
      letter-spacing: 2px;
    }
    .price {
      font-size: 30px;
    }
    .buy_credits td {
      width: 186px;
    }
    .paypal, .payza {
      width: 154px;
      height: 41px;
      cursor: pointer;
      float: left;
      background: url('/img/buynow.png');
      margin: 5px 0 0 12px;
      position: relative;
    }
    .payza {
      height: 31px;
      background: url('/img/payza.png');
    }
  </style>
  <div class="menu_button">
    MENU
    <div class="down"></div>
  </div>
  <div class="t1">
    “I Just Sent Out 1,000 Emails at List Joe and I was Surprised:<br/>
    52 Visits in Three Days! Amazing.”
  </div>

  <div class="t2">Zeljko Pavlovic, <i style="font-size: 14px">Satisfied List Joe member…</i> </div>

  <div class="t3">
    Do those results sound familiar? That’s just one of the many many testimonials we receive at List Joe every day.
    Perhaps you have sent out 1000s of emails at List Joe and received similar results for your business..
  </div>

  <div class="t4">
    Just think what you could do with up to 150,000 credits instantly <br/>
    added to your account..
  </div>

  <div class="t3">
    With our average click-through rates, that would mean 100s of real,
    home-based internet marketers will be visiting your site in a matter of minutes,
    for just pennies per lead!  Choose from one of our credit packages now to get started.
  </div>



  <div class="buy_credits">
    <table>
      <tr>
        <td style="padding-top: 35px;padding-left: 20px;">
          <span class="cr1">3,000</span><br/>
          <span class="cr2">CREDITS</span>
        </td>
        <td style="padding-left: 20px;">
          <span class="cr1">8,000</span><br/>
          <span class="cr2">CREDITS</span>
        </td>
        <td style="padding-left: 20px;">
          <span class="cr1">20,000</span><br/>
          <span class="cr2">CREDITS</span>
        </td>
        <td style="padding-left: 20px;">
          <span class="cr1">50,000</span><br/>
          <span class="cr2">CREDITS</span>
        </td>
        <td style="padding-left: 20px;">
          <span class="cr1">150,000</span><br/>
          <span class="cr2">CREDITS</span>
        </td>
      </tr>
      <tr>
        <td style="padding-top: 30px;padding-left: 10px ">
          90<br/>
          visitors estimated*
        </td>
        <td style="padding-left: 25px">
          240<br/>
          visitors estimated*
        </td>
        <td style="padding-left: 25px">
          601<br/>
          visitors estimated*
        </td>
        <td style="padding-left: 25px">
          1,502<br/>
          visitors estimated*
        </td>
        <td style="padding-left: 25px">
          4,505<br/>
          visitors estimated*
        </td>
      </tr>
      <tr>
        <td style="padding-top: 20px;">
          13 cents per visitor*
        </td>
        <td style="padding-left: 15px">
          11 cents per visitor*
        </td>
        <td style="padding-left: 35px">
          9 cents per visitor*
        </td>
        <td style="padding-left: 35px">
          6 cents per visitor*
        </td>
        <td style="padding-left: 15px">
          4 cents per visitor*
        </td>
      </tr>
      <tr>
        <td align="center">
          <span class="price">$12.00</span>
        </td>
        <td align="center">
          <span class="price">$27.00</span></span>
        </td>
        <td align="center">
          <span class="price">$57.00</span></span>
        </td>
        <td align="center">
          <span class="price" style="color:#c80011">$97.00</span></span>
        </td>
        <td align="center">
          <span class="price">$197.00</span></span>
        </td>
      </tr>
      <tr>
        <td align="center"  style="padding-top: 15px">
          <a href="https://buy.stripe.com/14k172dQNexV2w87sK" Style="background-color:#6772E5;color:#FFF;padding:8px
          12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
          Buy Now  
      </a>       
      </td>
      <td align="center" style="padding-top: 15px">
        <a href="https://buy.stripe.com/28o8zu285fBZ2w88wP" Style="background-color:#6772E5;color:#FFF;padding:8px
        12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
        Buy Now  
      </a>

    </td>
    <td align="center" style="padding-top: 15px">
      <a href="https://buy.stripe.com/5kA9Dy9Ax2PdfiU8wQ" Style="background-color:#6772E5;color:#FFF;padding:8px
      12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
      Buy Now  
    </a>

  </td>
  <td align="center" style="padding-top: 20px">
    <a href="https://buy.stripe.com/eVabLGh2Z9dB8Uw5kF" Style="background-color:#6772E5;color:#FFF;padding:8px
    12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
    Buy Now  
  </a>

</td>
<td align="center" style="padding-top: 15px">
  <a href="https://buy.stripe.com/dR6aHCeURexV0o06oK" Style="background-color:#6772E5;color:#FFF;padding:8px
  12px;border:0;border-radius:4px;font-size:1em;text-decoration: none;"> 
  Buy Now  
</a>
</td>
</tr>
</table>
</div>

<div class="t5">
  OFFICIAL REFUND POLICY
</div>

<div class="t3">
  It’s 100% Risk Free. We are so confident that you will be happy with your traffic that we took all the risk.  After your first mailing, if you are unhappy with the results, just send us a support ticket and we will send you a FULL refund. However, if you send more than one mailing after purchasing this offer you are NOT eligible for a refund. By ordering you agree to this. IT is binding. No exceptions.<br/>
  Due to the nature of this offer we have to have a strict refund policy. The people who have ads that work are going to jump on this right away and they would not ask for refunds so if you are not comfortable about this, please, do not order.
  <br/><br/>
  *visitors estimates are based on a 3% clickthrough rate which is the average at List Joe. You may get much more readers than that or less. Clickthrough rates depend on your headline and what product you are offering. Cost per visitor is estimated by the price of credits divided by the estimated amount of visitors you will receive. Membership level mailing limits still apply.
</div>
<br/><br/><br/>                </div>

</div>
</div>
<div id='error-message'></div>
<script>
  function selectButtonPlan(planId)
  {
    var stripe = Stripe('pk_test_Hftuw18q2xHaKfcILtFIo6tr00J9CPG3hU');

    var checkoutButton = document.getElementById('checkout-button-sku_'+planId);
    checkoutButton.addEventListener('click', function () {
    // When the customer clicks on the button, redirect
    // them to Checkout.
      stripe.redirectToCheckout({
        items: [{sku: 'sku_'+planId, quantity: 1}],

      // Do not rely on the redirect to the successUrl for fulfilling
      // purchases, customers may not always reach the success_url after
      // a successful payment.
      // Instead use one of the strategies described in
      // https://stripe.com/docs/payments/checkout/fulfillment
        successUrl: 'http://killthespammer.com/success',
        cancelUrl: 'http://killthespammer.com/cancelled',
        clientReferenceId: '{{ Auth::user()->id }}|'+planId,
        customerEmail: '{{ Auth::user()->email }}'
      })
      .then(function (result) {
        if (result.error) {
        // If `redirectToCheckout` fails due to a browser or network
        // error, display the localized error message to your customer.
          var displayError = document.getElementById('error-message');
          displayError.textContent = result.error.message;
        }
      });
    });
  }
</script>

@endsection