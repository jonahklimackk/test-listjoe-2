
@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')



<div class="wrapper">
  <div class="description">
    <h1>Downline</h1>
    <div class="par">
      When you refer members to Listjoe they get entered into your downline and shown below.
      Not only that, but you can input your affiliate link on our Recommended Tools page
      so that they can join under you in 6 or so other programs.
      That means you can earn commissions from 6 different places just by promoting Listjoe!
    </div>

    <h3>Your Referrals Level {{ $lv }}</h3>
    <table class="main_table" border="1">
      <thead>
        <tr style="font-size: 12px;">
          <th>Username</th>
          <th>Date joined</th>
          <th>Membership</th>
          <th>Surfed</th>
          <th>Credits your earned from 1st level</th>
          <th>Referring url</th>
          <th>Post message</th>
        </tr>
      </thead>
      @foreach($referrals as $referral)

      <tr>
        <td><a href="/members/profile/u/{{ $referral->username }}" id="{{ $referral->username }}" target="_blank" onMouseMove="javascript: get_mem_card_info('jimmylistbuilders2')" style="text-decoration:none">{{ $referral->username }}</a></td>
        <td>{{ $referral->created_at }}</td>
        <td>{{ $referral->membership }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      @endforeach

    </table>
  </div>
</div>



@include('members.layout.footer')
