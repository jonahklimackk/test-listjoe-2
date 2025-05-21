@include('members.layout.header')
@include('members.layout.menu')


<script src="https://cdn.ckeditor.com/ckeditor5/12.3.0/classic/ckeditor.js"></script>

</div>
<div class="wrapper">
      @include('members.layout.spotlight-ads')
    <link rel="stylesheet" href="/css/jquery.sceditor.default.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/css/themes/default.min.css" type="text/css" media="all" />

    <style>
        form{
            width: 560px;
        }
        input{
            width: 349px;
        }
    </style>
    <div class="header-content-description-wrapper">
        <div class="header-content-description-title">
            Solos
        </div>
        <div class="header-content-description-line"></div>
        <div class="header-content-description-text">

        </div>
    </div>


    <script>
        $('.header-content-description-wrapper').appendTo('.header-content-description')

    </script>


    <div class="main-content-main">
        <div class="main-content-wrapper2">

            <div class="description">
                <h1>Solo Mailings </h1>


                <div class="par">

                    These special ads go out to all members at once. Mail yours and get a big boost in traffic and sales.
                </div>

                @include('members.layout.form-feedback')
            </div>



        </div>


        <div class="main-content-green_title_with_point">
            Solo Tokens Available:{{ $user['solo_tokens'] }} tokens
        </div><br/><br/>
        {{-- <a href="/mail_history?solo=t">View your previous ads</a> --}}
        <br/><br/>
        <?PHP

        ?>
        @if($user->solo_tokens )
        <form method="post" id="soloForm" action="/members/solos/queue">
            @csrf
            <div style="display: inline-block;width:200px">Url You Are Advertising:</div>
            <input name="url"/>
            <br/><br/>
            <div style="display: inline-block;width:200px">Subject:</div>
            <input name="subject"/>
            <br><br>



            <textarea name="message" style="height: 161px;width: 562px;" id="editor" name="member"></textarea>
            <div> <span id="char_left">5000</span> characters left</div>

            <script>
                let editor;

                ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( newEditor => {
                  editor = newEditor;
              } )
                .catch( error => {
                  console.error( error );
              } );
          </script>


          <br/><br/>
          @include('members.layout.form-errors')

    <div style="text-align: center">
      Preview mail
      <br>
      <input type='checkbox' name='preview'>
      <br>
      <button class="blue_button" style="margin: 0 35px;" >
        Send message
      </button>
    </div>
  </form>
@endif
<br><br>

</div>
</div>

<form target="_blank" id="form_preview" action="/listjoe/index/showmessage" method="post" style="display: none">
	<input type="hidden" name="solo" value="1" />
    <textarea name="message_preview" id="message_preview"></textarea>
</form>

<script>
	function onChangeMailBody()
    {
        count = 5000 - $('#message').val().length
        $('#char_left').text(count)
    }
    $('#message').keyup(onChangeMailBody)
    $('#message').keydown(onChangeMailBody)
    $('#message').bind('paste', onChangeMailBody)

    $('#preview').click(function() {
        message = $('[name="message"]').val();
        $('#message_preview').val(message);
        $('#form_preview').submit()
    })

    $("textarea[name='message']").sceditor({
        style: "/css/jquery.sceditor.default.min.css",
        toolbar: "bold,italic,underline,strike,subscript,superscript|left,center,right,justify|font,size,color,removeformat|bulletlist,orderedlist,table|horizontalrule,image,link,unlink,emoticon|source"
    });

</script>                </div>

</div>
</div>


@include('members.layout.footer')