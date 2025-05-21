<script>
  var answer_id;
  var tab_width = 0;

function repliedTo(messageId, tabWidth)
  {
    $('[name=answer_id]').val(messageId)
    $('[name=tab_width]').val(tabWidth)
  }


  function hoverMessage()
  {
    $(this).find('.reply').css('visibility', 'visible ')
    $(this).find('.remove').css('visibility', 'visible ')
  }
  function leaveMessage()
  {
    $(this).find('.reply').css('visibility', 'hidden ')
    $(this).find('.remove').css('visibility', 'hidden ')
  }

  function sendMessage(type)
  {
    // alert(tab_width);
    message = $('.send_message textarea').val();
    tab_width = $('input[name="tab_width"]').val();
    // alefalertrt(tab_width);


    if ( message == '' ) {
      $('.messages .send_message textarea').css('border','1px red solid');
      setTimeout(function(){$('.messages .send_message textarea').css('border','1px gray solid')},2000)
      return
    }
    $('.messages .main-content-wrapper2-content').css('opacity', '0.3');
    $('body').css('cursor','wait');
    if(answer_id === undefined) {
      answer_id = 0;
    }
    if(answer_id)
    {
      tab_width=parseInt(tab_width);
      // alert(tab_width)
      tab_width = tab_width+30;
    }

    // alert(tab_width);




    $.post('/members/sendmessage',{
      'message': message,
      @if(isset($profileUser))
      'to_user_id':{{ $profileUser->id }},
      @else
      'to_user_id':{{ Auth::user()->id }},
      @endif
      'type': type,
      '_token': "{{ csrf_token() }}",
      'tab_width': tab_width,
      'answer_id': answer_id}, function(){
        document.location = document.location ;
      })
    }

  function replyMessage(e)
  {
    answer_id = $(e.delegateTarget).parents('.message').attr('data-id');
    $('form.send_message').slideDown('fast')
  }



  function deleteMessage()
  {
    id = $(this).parents('.message').attr('data-id');
    if ( confirm('Are you sure you want remove this message?') ) {
      $.get('/members/deletemessages/id/' + id)
      $(this).parents('.message').fadeOut('fast');
    }
  }

  $('.message')
  .bind('mouseenter',hoverMessage)
  .bind('mouseleave',leaveMessage)
  $('.message .remove')
  .bind('mouseup', deleteMessage)
  $('.message .reply')
  .bind('mouseup', replyMessage);

  $('#sendMessagePublic').click(function(){
    sendMessage('PUBLIC');
  })

  $('#sendMessagePrivately').click(function(){
    sendMessage('PRIVATE');
  })
</script>

