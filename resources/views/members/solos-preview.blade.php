
<!DOCTYPE html>
<html>

<head>

  <style>

    .blue_button {
      color: white;
      font-size: 17px;
      font-weight: bold;
      text-align: center;
      background: #1385d7; /* Old browsers */
      background: -moz-linear-gradient(top,  #1385d7 0%, #1177c1 100%); /* FF3.6+ */
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1385d7), color-stop(100%,#1177c1)); /* Chrome,Safari4+ */
      background: -webkit-linear-gradient(top,  #1385d7 0%,#1177c1 100%); /* Chrome10+,Safari5.1+ */
      background: -o-linear-gradient(top,  #1385d7 0%,#1177c1 100%); /* Opera 11.10+ */
      background: -ms-linear-gradient(top,  #1385d7 0%,#1177c1 100%); /* IE10+ */
      background: linear-gradient(to bottom,  #1385d7 0%,#1177c1 100%); /* W3C */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1385d7', endColorstr='#1177c1',GradientType=0 ); /* IE6-9 */
      display: inline-block;
      padding: 10px 20px;
      border-radius: 5px;
      text-shadow: rgba(0, 0, 0, 0.7) 0 1px 2px;
      cursor: pointer;
      min-width: 110px;
    }
  </style>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="/js/jquery.sceditor.min.js"></script>

</head>
<body>

  <h1>Subject: {{ $request['subject'] }}</h1>
  <br>
  <div style="font-family: arial;width: 820px;">
    <!-- <a href="/"><img src="/img/mail_head.png"/></a> -->
    <div style="position: relative;width: 670px;margin: 0 auto;overflow: hidden">
      <div style="margin-right: 10px;float:left;">
        <div style="border-radius: 100px;margin: 5px;overflow: hidden;">
          <a href='/members/profile/u/{{ Auth::user()->username }}'>

            <?php
              $post = App\Models\Post::where('user_id', Auth::user()->id)->get()->first();
            ?>

            @if(!is_null($post))
            <img src="{{$post->getFirstMediaUrl('images', 'thumb')}}" width='100' height='100' class='photo'/>
            @else 
            <img src='{{ Auth::user()->profile_photo_url }}' width='100' height='100' class='photo'/>
            @endif 

          </a>
        </div>

      </div>
      <div style="font-weight: bold;line-height: 20px;color: #222;margin: 6px 30px 0 0;float:left;font-size: 14px;width: 270px;">
        This is a message from <br/>
        <span style="color:#D94C55;font-size: 17px;">{{ Auth::user()->name }}</span><br/>
        a colleague at Listjoe.com.<br/>
        See below for subscription information and to remove.
      </div>


    </div>
    <div style="clear: both;width: 670px;margin: 30px auto;font-size: 14px;">
      <!-- <textarea rows=25 cols=50> -->
        {!! nl2br($request['message']) !!}
        <!-- </textarea> -->

      </div>
      <div style="text-align: center">
        <a href="{{ $request['url'] }}" style="background: #FFEE9E;
        display: inline-block;
        margin: 0 auto;
        color: #0052AA;
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 14px;
        text-shadow: white 0 1px;">
        Click Here to View Website and earn Credits!
      </a>
    </div>
    <br/>
    <hr/>
    <br/>
    <div style="
    font-size: 12px;
    overflow: hidden;
    width: 670px;
    margin: 0 auto;">
    <div style="float:left;max-width:45%;width:45%">
      <b>Report Ad</b><br/>
      We are not responsible for false or misleading information sent from other members. We recommend you investigate all offers thoroughly before making any purchase decisions.
      <br/>
      <b>Report Ad</b><br/>
      for inappropriate content
      <a href="mailto:support@listjoe.com?subject=FW:%20Inappropriate%20Email&body=This%20email%20with%20id%20123456%20is%20inappropriate%20or%20breaks%20frames.">support@listjoe.com</a>
    </div>
    <div style="float:right;max-width:45%;width:45%">
      You received this email because you are a member at ListJoe.com.<br/>
      You joined on {{ Auth::user()->created_at }} and confirmed you email address: {{ Auth::user()->email }}.<br/>
      You last login date was on {{ $logins->updated_at ?? '' }} with ip address: {{ $logins->ip ?? '' }}<br/><br/>

      <a href="/unsubscribe/u/{{ Auth::user()->username }}">Unsubscribe</a>


    </div>
  </div>
  <br/><br/>
  <!-- <div style="text-align: center;clear: both;font-size: 12px;">© 2012 ListJoe</div> -->
</div>

<br>

<table align="center">
  <tr>
    <td> 
      <button class="blue_button" onclick="history.back(1)"  style="margin: 0 150px;" >
        Go Back
      </button></td>
      <td> 
       <form method="post" action="/members/solos/queue">

        @csrf
        <input type="hidden" name='url' value="{{ $request['url'] }}">
        <input type="hidden" name='subject' value="{{ $request['subject'] }}">
        <input type="hidden" name='message' value="{{ $request['message'] }}">
        <button class="blue_button" style="margin: 0 35px;" >
          Send This Mailing
        </button>
      </form>
    </td>
  </tr>
</table>
</div>


</div>
</body>