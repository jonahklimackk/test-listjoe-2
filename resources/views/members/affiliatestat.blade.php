@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')


<div class="wrapper">
  @include('members.layout.spotlight-ads')
  <div class="description">
    <h1>Your List Joe Affiliate Stats</h1>
    <div class="par">
      We make promoting List Joe as easy and as effective as possible by tracking your ads for you!
    </div>
    <div class="par">
      This feature allows you to track all the clicks you receive to your affiliate links.
    </div>
    <div class="par">
      Here is how it works:
    </div>
    <div class="par">
      For every marketing campaign you are doing with your List Joe affiliate link, you can customize the link so that we can track it separately for you.  As an example, lets say you are sending and ad out at a list builder, then you can use a link like this:
    </div>
    <div class="par">
      <a href="/aff/{{ Auth::user()->username }}/listbuilderad"><b>http://ListJoe.com/aff/{{ Auth::user()->username }}/listbuilderad</b></a>
    </div>
    <div class="par">
      And if you are promoting on a traffic exchange, you can use a link like this:
    </div>
    <div class="par">
      <a href="/aff/{{ Auth::user()->username }}/trafficexchangead"><b>http://ListJoe.com/aff/{{ Auth::user()->username }}/trafficexchangead</b></a>
    </div>
    <div class="par">
      All you do is add ‘listbuilderad’ or anything you want at the end of your affiliate link, and we’ll do the rest!
    </div>
    <div class="par">
      Then, all the clicks, joins, and confirmed members that come through those links will be tracked and the results will be displayed below. That way you will know which ad is working and which one isn’t.
    </div>
  </div>



  <table class="main_table">
    <thead>
      <tr>
        <th>#</th>
        <th>Track code</th>
        <th># of clicks</th>
        <th># of joins</th>
        <th># of sales</th>
      </tr>
    </thead>
    <tbody>

      @if(isset($campaigns))
      @foreach($campaigns as $campaign)
      <tr>
        <td>{{ $loop->index }}</td>
        <td>{{ $campaign->value }}</td>
        <td>{{ $campaign->raw }}</td>
        <td>{{ $campaign->joins }}</td>
        <td>{{ $campaign->sales }}</td>
      </tr>
      @endforeach
      @endif

    </tbody>
  </table>                </div>

</div>
</div>

@include('members.layout.footer')
