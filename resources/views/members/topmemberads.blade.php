@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')


<div class="wrapper">`
  <div class="description">
    <h1>Your List Joe Top Member Ads</h1>
    <div class="par">
      Welcome to your Top Member List Joe ads. These ads are displayed at the bottom left of the pages all throughout List Joe,
      and they are only available for as long as you are upgraded member.
    </div>
    <div class="par">
      Here you can add and edit your Top Member Ad:
    </div>
  </div>

  @include('members.layout.form-feedback')

  <div class="topmemberad_add">
    <div class="sidebar_vda">
      <div class="head">
        <span class="name">{{ Auth::user()->name }}</span>
        <span class="rating">Rating: {{ Auth::user()->getRating() }}%</span>
      </div>

      @if(isset($topMemberAd))

      <div class="text">
        <div class="title" id="title">{{ $topMemberAd->headline }}</div>
        <div class="desc1" id="desc1">{{ $topMemberAd->body1 }}</div>
        <div class="desc2" id="desc2">{{ $topMemberAd->body2 }}</div>
      </div>
      <div class="url">
        <a href="#" id="url"> {{ $topMemberAd->url }}</a>
      </div>
    </div>

    @else

    <div class="text">
      <div class="title" id="title">Your Nice Titles Here</div>
      <div class="desc1" id="desc1">Write something here and </div>
      <div class="desc2" id="desc2">and even here too, see</div>
    </div>
    <div class="url">
      <a href="#" id="url">http://somewebsite.com</a>
    </div>
  </div>

  @endif





  @if(isset($topMemberAd))

  <div class="buttons">
    <div class="spot_button" id="change"><b>Change</b><i></i></div>
    <div class="spot_button" id="remove"><b>Remove</b><i></i></div>
    <form class="form_remove" method="post" style="display: none">
      @csrf
      <input type="hidden" name="operation" value="remove">
    </form>
    <br/>
    <div class="spot_button" id="update"><b>Update Statistic</b><i></i></div>
    <form class="form_update" method="post" style="display: none">
      @csrf
      <input type="hidden" name="operation" value="update">
    </form>
    <br><br>



    <div> Displayed Since: {{ $topMemberAd->created_at }}</div>
    <div><b> 
     Views {{ $topMemberAd->views }}
     Clicks {{ $topMemberAd->clicks }}
   </b></div>
  </div>

  @else

  <div class="buttons">
    <div class="spot_button3"><b>Change</b><i></i></div>
    <div class="spot_button3"><b>Remove</b><i></i></div>
    <br/>
    <div class="spot_button3"><b>Update Statistic</b><i></i></div>
    <br><br>
  </div>

  @endif

</div>


@if(! isset($topMemberAd))
<form class="spotlight_form"  method="post">
  @else
  <form class="spotlight_form"  style="display: none" method="post">
    @endif

    @csrf
    <input type="hidden" name="operation" value="save"/>

    {{-- Headline --}}
    <div class="line">
      <div class="name">Your Ad Title</div>
      @if(isset($topMemberAd))
      <input type="text" name="title" maxlength="20" value="{{$topMemberAd->headline }}" placeholder="20 characters maximum"/>
      @else
      <input type="text" name="title" maxlength="20" value="" placeholder="20 characters maximum"/>
      @endif
    </div>

    {{-- descr1 --}}
    <div class="line">
      <div class="name">Description Line 1</div>
      @if(isset($topMemberAd))
      <input type="text" name="desc1" maxlength="35" value="{{$topMemberAd->body1 }}" placeholder="35 characters maximum"/>
      @else
      <input type="text" name="desc1" maxlength="35" value="" placeholder="35 characters maximum"/>
      @endif
    </div>

    {{-- descr2 --}}
    <div class="line">
      <div class="name">Description Line 2</div>
      @if(isset($spotlightAd))
      <input type="text" name="desc2" maxlength="35" value="{{ $topMemberAd->body2 }}" placeholder="35 characters maximum"/>
      @else
      <input type="text" name="desc2" maxlength="35" value="" placeholder="35 characters maximum"/>
      @endif
    </div>

    {{-- url --}}
    <div class="line">
      <div class="name">URL of website</div>
      @if(isset($topMemberAd))
      <input type="text" name="url" maxlength="75" value="{{ $topMemberAd->url }}" placeholder="http://yourwebsite.com"/>
      @else
      <input type="text" name="url" maxlength="75" value="" placeholder="http://yourwebsite.com"/>
      @endif
    </div>
    @include('members.layout.form-errors')
    <div style="text-align: center">
      <div class="blue_button" id="save">Save</div>
    </div>
  </form>
  <br/><br/>

</form>

<br/><br/>

<script>
  function changeTitle()
  {
    $('.form_error[data-input=title]').fadeOut('fast')
    title = $(this).val();
    if(title == ''){
      $('#title').text('Your nice titles here');
    } else {
      $('#title').text(title)
    }
  }
  function changeDesc1()
  {
    $('.form_error[data-input=desc1]').fadeOut('fast')
    desc1 = $(this).val();
    if(desc1 == ''){
      $('.topmemberad_add #desc1').text('Write somethings here and');
    } else {
      $('.topmemberad_add #desc1').text(desc1)
    }
  }
  function changeDesc2()
  {
    $('.form_error[data-input=desc2]').fadeOut('fast')
    desc2 = $(this).val();
    if(desc2 == ''){
      $('.topmemberad_add #desc2').text('you can write something here too');
    } else {
      $('.topmemberad_add #desc2').text(desc2)
    }
  }
  function changeUrl()
  {
    $('.form_error[data-input=url]').fadeOut('fast')
    url = $(this).val();
    if(url == ''){
      $('.topmemberad_add #url').text('www.yourwebsite.com').attr('href','#');
    } else {
      $('.topmemberad_add #url').text(url).attr('href',url);
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
</div>


@include('members.layout.sidebar-spotlight')
@include('members.layout.footer')