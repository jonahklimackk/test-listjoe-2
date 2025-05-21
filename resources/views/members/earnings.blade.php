@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')


<div class="wrapper">

  @include('members.layout.spotlight-ads')

  <div class="description">
    <h1>Commissions</h1>
    <div class="par">
      Every time you refer someone to List Joe, you have a chance to earn a commission.
      We are constantly tweaking our offers to ensure that List Joe continues to convert extremely high.
    </div>
    <div class="par">
      To maximize your commissions, check out our <a href="/members/reftools">Affiliate Tools Page</a> for highly effective promotional tools.
      They are already set up with your affiliate link and ready to go!
    </div>
    <div class="par">
      <b>Want to earn even more commissions?  Currently you earn just
      {{ $percentage*100 }} percent on each order from your affiliate link. </b></div>
      <div class="ad" align="center">Upgrade to gold to get 50% commission. <br>Earn $100 on every gold membership upgrade. .<br> <a href="/members/upgrade">Upgrade Now!</a>
    </div>
  </div>

  <div class="description">
    <h1>Grand total owed for this month: ${{ $total }}</h1>
  </div>
  <div class="description">
    <div class="description">
    Here is your sales activity for {{ $period->englishMonth }}, {{ $period->year }}   </div>
    <table class="main_table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Membership</th>
           <th>Price</th>
          <th>Your commission</th>
        </tr>
      </thead>
      @if(isset($subscriptionOrders))
      @foreach($subscriptionOrders as $subscriptionOrder)
      <tbody>
        <tr>
          <td>{{ $subscriptionOrder['created_at'] }}</td>       
          <td> {{ $subscriptionOrder['membership_name'] }}</td>  
          <td>  {{ $subscriptionOrder['price'] }} </td>    
            <td>  {{ $subscriptionOrder['commission'] }} </td>       
        </tr>
      </tbody>
      @endforeach
      @endif
      <tbody>
        <tr>
          <td colspan="3" align="right">Total</td>
          <td colspan="3">
            ${{ $total }}
          </td>
        </tr>
      </tbody>
    </table>

    You are due ${{ $total }} at the end of the month.
  </div>
</div>

</div>
</div>

@include('members.layout.footer')
