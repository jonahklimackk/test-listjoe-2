@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')


<div class="wrapper">
  <div class="description">
    <h1>Your List Joe Spotlight Ads</h1>
    <div class="par">
      Welcome to your List Joe Spotlight Ads! Here you can add or edit your current Spotlight ad.
      Be sure to have <u>a real picture of yourself</u> on your profile because it will be displayed next to your ad.
    </div>
    <div class="par">
      Make your ad now:
    </div>
  </div>


  @include('members.layout.form-feedback')


  <?php
  $post = App\Models\Post::where('user_id', Auth::user()->id)->get()->first();
  ?>

  <div class="spotlight_add">

    @if(isset($spotlightAd))

    <div class="ad">




      <a href='/members/profile/u/{{ Auth::user()->username }}'>
        @if(!is_null($post))
        <img src="{{$post->getFirstMediaUrl('images', 'thumb')}}" width='40' height='40' class='photo'/>
        @else
        <img src='{{ Auth::user()->profile_photo_url }}' width='40' height='40' class='photo'/>
        @endif 
      </a>`



      <div class="info">
        <span class="name">{{ Auth::user()->name }}</span>
        <img class="star" src="/img/spotlights_ads_star.png"/>
        <div class="rating">Joe Rating: {{ Auth::user()->getRating() }}%</div>
      </div>

      <div class="title" id="title">{{ $spotlightAd->headline }}</div>
      <div class="text" id="desc1">{{ $spotlightAd->body1 }}</div>
      <div class="text" id="desc2">{{ $spotlightAd->body2 }}</div>
      <div class="href">
        <a href="#" id="url">{{ $spotlightAd->url }}</a>
      </div>
    </div>

    @else

    <div class="ad">
      <a href='/members/profile/u/{{ Auth::user()->username }}'>
        @if(!is_null($post))
        <img src="{{$post->getFirstMediaUrl('images', 'thumb')}}" width='40' height='40' class='photo'/>
        @else
        <img src='{{ Auth::user()->profile_photo_url }}' width='40' height='40' class='photo'/>
        @endif 
      </a>
      <div class="info">
        <span class="name">{{ Auth::user()->name }}</span>
        <img class="star" src="/img/spotlights_ads_star.png"/>
        <div class="rating">
          Joe Rating: {{ Auth::user()->getRating() }}%
        </div>
      </div>

      <div class="title" id="title">Your Nice Titles Here</div>
      <div class="text" id="desc1">Write something here and </div>
      <div class="text" id="desc2">and even here too, see</div>
      <div class="href">
        <a href="#" id="url">http://somewebsite.com</a>
      </div>
    </div>

    @endif

    @if(isset($spotlightAd))

    <div class="buttons">
      <div class="spot_button" id="change" >
        <b>Change</b><i></i>
      </div>
      <div class="spot_button" id="remove">
        <b>Remove</b><i></i>
      </div>
      <form class="form_remove" method="post" style="display: none">
        @csrf
        <input type="hidden" name="operation" value="remove">
      </form>
      <div class="spot_button" id="update">
        <b>Update Statistic</b><i></i>
      </div>
      <form class="form_update" method="post" style="display: none">
        @csrf
        <input type="hidden" name="operation" value="update">
      </form>

      
      <div> Displayed Since: {{ $spotlightAd->created_at }}</div>
      <div><b> 
       Views {{ $spotlightAd->views }}
       Clicks {{ $spotlightAd->clicks }}
     </b></div>
   </div>


   @else

   <div class="buttons">
    <div class="spot_button_inact">
      <b>Change</b><i></i>
    </div>
    <div class="spot_button_inact">
      <b>Remove</b><i></i>
    </div>
    <br/>
    <div class="spot_button_inact">
      <b>Update Statistic</b><i></i>
    </div>
  </div>

  @endif

</div>

@if(! isset($spotlightAd))
<form class="spotlight_form"  method="post">
  @else
  <form class="spotlight_form"  style="display:none" method="post">
    @endif

    @csrf
    <input type="hidden" name="operation" value="save"/>

    {{-- Headline --}}
    <div class="line">
      <div class="name">
        Your Ad Title
      </div>
      @if(isset($spotlightAd))
      <input type="text" name="title" maxlength="20" value="{{ $spotlightAd->headline }}" placeholder="20 characters maximum"/>
      @else
      <input type="text" name="title" maxlength="20" value="" placeholder="20 characters maximum"/>
      @endif
    </div>

    {{-- descr1 --}}
    <div class="line">
      <div class="name">
        Description Line 1
      </div>
      @if(isset($spotlightAd))
      <input type="text" name="desc1" maxlength="35" value="{{ $spotlightAd->body1 }}" placeholder="35 characters maximum"/>
      @else
      <input type="text" name="desc1" maxlength="35" value="" placeholder="35 characters maximum"/>
      @endif
    </div>

    {{-- descr2 --}}
    <div class="line">
      <div class="name">
        Description Line 2
      </div>
      @if(isset($spotlightAd))
      <input type="text" name="desc2" maxlength="35" value="{{ $spotlightAd->body2 }}" placeholder="35 characters maximum"/>
      @else
      <input type="text" name="desc2" maxlength="35" value="" placeholder="35 characters maximum"/>
      @endif
    </div>

    {{-- url --}}
    <div class="line">
      <div class="name">
        URL of website
      </div>
      @if(isset($spotlightAd))
      <input type="text" name="url" maxlength="75" value="{{ $spotlightAd->url }}" placeholder="http://yourwebsite.com"/>
      @else
      <input type="text" name="url" maxlength="75" value="" placeholder="http://yourwebsite.com"/>
      @endif
      <br>
    </div>



    @include('members.layout.form-errors')


    <div style="text-align: center">
      <div class="blue_button" id="save">
        Save
      </div>
    </div>
  </div>
</form> {{-- only one </form> needed due to if statement above --}}

<br><br>

<script>
  function changeTitle()
  {
    $('.form_error[data-input=title]').fadeOut('fast')
    title = $(this).val();
    if(title == ''){
      $('.spotlight_add #title').text('Your nice titles here');
    } else {
      $('.spotlight_add #title').text(title)
    }
  }
  function changeDesc1()
  {
    $('.form_error[data-input=desc1]').fadeOut('fast')
    desc1 = $(this).val();
    if(desc1 == ''){
      $('.spotlight_add #desc1').text('Write somethings here and');
    } else {
      $('.spotlight_add #desc1').text(desc1)
    }
  }
  function changeDesc2()
  {
    $('.form_error[data-input=desc2]').fadeOut('fast')
    desc2 = $(this).val();
    if(desc2 == ''){
      $('.spotlight_add #desc2').text('you can write something here too');
    } else {
      $('.spotlight_add #desc2').text(desc2)
    }
  }
  function changeUrl()
  {
    $('.form_error[data-input=url]').fadeOut('fast')
    url = $(this).val();
    if(url == ''){
      $('.spotlight_add #url').text('www.yourwebsite.com').attr('href','#');
    } else {
      $('.spotlight_add #url').text(url).attr('href',url);
    }
  }
  $('input[name=title]').keyup(changeTitle).keydown(changeTitle).bind('paste',changeTitle)
  $('input[name=desc1]').keyup(changeDesc1).keydown(changeDesc1).bind('paste',changeDesc1)
  $('input[name=desc2]').keyup(changeDesc2).keydown(changeDesc2).bind('paste',changeDesc2)
  $('input[name=url]').keyup(changeUrl).keydown(changeUrl).bind('paste',changeUrl)

  $('#save').click(function(){
    title = $('input[name=title]').val();
    desc1 = $('input[name=desc1]').val();
    desc2 = $('input[name=desc2]').val();
    url = $('input[name=url]').val();

    exit=false;
    if(title==''){
      addError('title', 'Your ad title is empty');
      exit=true;
    }
    if(desc1==''){
      addError('desc1', 'Your ad desription line 1 is empty');
      exit=true;
    }
    if(desc2==''){
      addError('desc2', 'Your ad desription line 2 is empty');
      exit=true;
    }
    if(url=='' || url=='http://'){
      addError('url', 'Your ad url is empty');
      exit=true;
    }
    if(exit)return;

    $('.spotlight_form').submit();
  })

  $('#change').click(function(){
    $('.spotlight_form').slideDown('fast')
  })
  $('#remove').click(function(){
    if(confirm('Are you sure you want to remove this ad?')){
      $('.form_remove').submit()
    }
  })
  $('#update').click(function(){
    if(confirm('Are you sure you want to clean your stat?')){
      $('.form_update').submit();
    }
  })


</script>


@include('members.layout.sidebar-spotlight')
@include('members.layout.footer')