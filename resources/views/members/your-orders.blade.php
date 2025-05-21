@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')


<div class="wrapper">

    @include('members.layout.spotlight-ads')
  <div class="description">
    <h1> Your Purchases</h1>
    <div class="par">
Here are all the orders you've made with us. Thanks for your business.
    </div>

  </div>

  <div class="description">
    Subscription Orders
    <table class="main_table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Membership</th>
           <th>Renews At</th>
           <th>Price</t>
        </tr>
      </thead>
      @if(isset($subscriptionOrders))
      @foreach($subscriptionOrders as $subscriptionOrder)
      <tbody>
        <tr>
          <td>{{ $subscriptionOrder['created_at'] }}</td>       
          <td> {{ $subscriptionOrder['name'] }}</td>
          <td> {{ $subscriptionOrder['ends_at'] }}</td>    
          <td>  ${{ number_format($subscriptionOrder['price'],2) }} </td>    
        </tr>
      </tbody>
      @endforeach
      @endif
    </table>
  </div>



    <div class="description">
    Credits Orders
    <table class="main_table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Credits</th>
           <th>Price</th>
        </tr>
      </thead>
      @if(isset($creditsOrders))
      @foreach($creditsOrders as $creditsOrder)
      <tbody>
        <tr>
          <td>{{ $creditsOrder['created_at'] }}</td>       
          <td> {{ $creditsOrder['credits'] }}</td>  
          <td>  ${{ number_format($creditsOrder['price'],2) }} </td>    
        </tr>
      </tbody>
      @endforeach
      @endif
    </table>
  </div>

  <div class="description">
    Solo Ad Orders
    <table class="main_table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Solo Ad Tokens</th>
           <th>Price</th>
        </tr>
      </thead>
      @if(isset($soloOrders))
      @foreach($soloOrders as $soloOrder)
      <tbody>
        <tr>
          <td>{{ $soloOrder['created_at'] }}</td>       
          <td> {{ $soloOrder['name'] }}</td>  
          <td>  ${{ number_format($soloOrder['price'],2) }} </td>    
        </tr>
      </tbody>
      @endforeach
      @endif
    </table>
  </div>

@include('members.layout.footer')
