
<div class="step1 sendmail_block">
  <img src="/img/sendmail_step1.png" class="headimg"/>
  <div class="message" style="font-size: 15px;">DETERMINE NUMBER OF RECIPIENTS</div>
  <div class="cont">
    <div class="fs13">
      The table below breaks down how many people you will reach this mailing.
      The amount of recipients you will reach depends on your ListJoe account status, downline, and credits spent.
      <br/><br/>
      You currently have 1500 credits. There is currently a limit of 1000 credits per mailing.
    </div>
    <br/>
    <span><b>How Many Credits Would You Like To Spend? </b></span>
    <input type="number" name="credits" value="0" style="width: 130px;"  />
    <br>
    <span class="fs13">Use numeric values only, no commas</span>
    <br/><br/>
    @if($user['membership'] == 'free')
    <div style="color:red"><b>Want more credits? You can instantly access 1000s of credits right now..</b>
      <a href="/members/buycredits" class="href1">Click Here to Order!</a>
    </div>
    @endif
      <br/><br/>
      <table style="font-size: 13px;font-weight: bold;">
        <tr class="table_tr">
          <td class="table_td_name">Number of People in Your Downline</td>
          <td id="number_people_downline">{{ $user->num_downline }}</td>
        </tr>
        <tr class="table_tr">
          <td class="table_td_name">Bonus Recipients From Upgrade</td>
          <td id="bonus_credits">{{ $membership->mailing_bonus }}</td>
        </tr>
        <tr class="table_tr">
          <td class="table_td_name">Credits Spent</td>
          <td id="credits_spent"></td>
        </tr>
        <tr class="table_tr">
          <td class="table_td_name">Total Recipients</td>
          <td id="total_recipients"> </td>
        </tr>
        <tr class="table_tr">
          <td class="table_td_name">Your message will reach </td>
          <td id="total_recipients2"></td>
        </tr>
      </table>
    </div>
  </div>
  <br/>