@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')

<!-- Load Stripe.js on your website. -->
<script src="https://js.stripe.com/v3"></script>

<div class="wrapper">
  <style>
    .message-large-red{
      color: red;
      text-align: center;
      font-size: 32px;
      line-height: 40px;
      font-family: Arial;
    }
    #button-buynow-blue{
      bottom: 25px;
      position: absolute;
      right: 114px;
    }
  </style>
  <div class="header-content-description-wrapper">
    <div class="header-content-description-line"></div>
    <div class="header-content-description-text">

    </div>
  </div>
  <script>
    $('.header-content-description-wrapper').appendTo('.header-content-description')
  </script>

  <div class="main-content-main">
    <div class="main-content-wrapper2">
      <p class="global_info_paragraph">
        Attention:  By the time you read this, the offer may already be finished.
      </p>
      <p class="global_info_paragraph message-large-red">
        Are you ready to take REAL action and email EVERY ListJoe member…right now?
      </p>
      <p class="global_info_paragraph">
        ListJoe has become something that every home based business owner needs
        a responsive list of active buyers that are all interested in the same thing  making money online!
      </p>
      <p class="global_info_paragraph">
        With ListJoe Solo Tokens you have the opportunity to get your ad in
        front of every single one of these home based business owners…right now!
      </p>
      <p class="global_info_paragraph">
        You will reach every single member at ListJoe, right now, without
        having to spend a single credit.
      </p>
      <p class="global_info_paragraph">
        Unfortunately, we cannot guarantee the availability of solos.
      </p>
      <p class="global_info_paragraph">
        Fortunately, we do sell them at an awesome discount if you buy in bulk,
        so the next time that they are available you can stock up on them.
      </p>


      <div style="position: relative;">
        <div class="optionbuy">
          <div class="goption">
            <p id="1">
              2 Solo Tokens $97.00
            </p>

            <button
            style="background-color:#6772E5;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em"

            id="checkout-button-sku_FXupRnt0zkB9Uo"
            {{-- id="checkout-button-sku_FPGNVGW5qWz3MT" --}}
            role="link"
            {{-- onclick="getPlanAndGo('FPGNVGW5qWz3MT')" --}}
            onclick="getPlanAndGo('FXupRnt0zkB9Uo')"
            >
            Buy Now
          </button>

          <p id="2"><label for="21">5 Solo Tokens $197.00</label> </p>

          <button
          style="background-color:#6772E5;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em"
          id="checkout-button-sku_FPGai90wT2zvyh"
          role="link"
          onclick="getPlanAndGo('FPGai90wT2zvyh')"
          >
          Buy Now
        </button>


        <p id="3"><label for="22">15 Solo Tokens $497.00</label> </p>


        <button
        style="background-color:#6772E5;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em"
        id="checkout-button-sku_FPGcD0we4gXzu9"
        role="link"
        onclick="getPlanAndGo('FPGcD0we4gXzu9')"
        >
        Buy Now
      </button>


      <p id="4"><label for="23">40 Solo Tokens $997.00</label> </p>


      <button
      style="background-color:#6772E5;color:#FFF;padding:8px 12px;border:0;border-radius:4px;font-size:1em"
      id="checkout-button-sku_FPGdyzkaEpX3Pe"
      role="link"
      onclick="getPlanAndGo('FPGdyzkaEpX3Pe')"
      >
      Buy Now
    </button>

  </div>
  <div id="error-message"></div>
</div>
</div>

<p class="global_info_paragraph">
  The list that you have been looking for is finally here.  It is now
  up to you to decide if you are truly ready to make it online, or if
  you prefer to wait on the sidelines a little longer and watch the
  beautiful world of online freedom pass you by.
</p>
<p class="global_info_paragraph">
  Refund Policy: you can get a full refund only if you have not sent
  you ad yet.
</p>

</div>

</div>

<script>
  function selectPlan() {
    var selected = document.getElementsByName('solo');

    for (var i = 0; i < selected.length; i++) {
      var value = selected[i].value;

      if (selected[i].checked) {

        if (value ==20) {
          window.location.href = '/members/cart/type/SOLOS/id/20';
          exit();
        }

        if (value ==21) {
          window.location.href = '/members/cart/type/SOLOS/id/21';
          exit();
        }

        if (value ==22) {
          window.location.href = '/members/cart/type/SOLOS/id/22';
          exit();
        }

        if (value ==23) {
          window.location.href = '/members/cart/type/SOLOS/id/23';
          exit();
        }

      }
    }
  }

</script>



<script>
  function getPlanAndGo(planId)
  {
    // var stripe = Stripe('pk_live_2cqYWR5tZR7ccQYsz2Cyn5SN00hWQphdqO');
    //
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






</div>

</div>
</div>



@include('members.layout.footer')