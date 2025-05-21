@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')

<div class="wrapper">
  <div class="description">
    <h1>Your List Joe Spotlight Ads</h1>
    <div class="par">
      <b>What is this feature?</b>
      Whenever someone logs into List Joe and visits their homepage they will see YOUR ad at the top of the page!
      Not only will your Spotlight ad have a link to the site that you are promoting,
      but it will also show your profile info, and your List Joe rating.
    </div>
    <div class="par">
      These <b><i>ads are so effective</i></b> that we can only limit them to our Gold members.
      <a href="/members/upgrade"><b>Upgrade to Gold now</b></a> and <u>unlock your Spotlight ads</u>
      they will be displayed for you on auto-pilot for as long as you’re upgraded to Gold. <br/>
      <a href="/members/upgrade"><b>Unlock your Spotlight Ads now!</b></a>
    </div>
  </div>

</div>

@include('members.layout.sidebar-spotlight')
@include('members.layout.footer')