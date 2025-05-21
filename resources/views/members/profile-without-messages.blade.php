

{{-- Show an empty message --}}

<div class="messages">
  <div class="title"></div>
  There are no messages.

{{-- Form for users visiting other member's profiles --}}


<form class="send_message" method="post">
    @csrf
    <input type="hidden" name="answer_id" value="0">
    <input type="hidden" name="tab_width" value="10">

    <textarea name="message"></textarea>
    <br/><br/>
    <div style="text-align: center">
      <div class="blue_button" id="sendMessagePublic">
        <b>Send</b>
      </div>
      <div class="blue_button" id="sendMessagePrivately">
        <b>Send Privately</b>
      </div>
    </div>
    <br/>
  </form>


</div>