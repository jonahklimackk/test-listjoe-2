


 @if((isset($profileUser) && Auth::user()->id != $profileUser->id))
      {{--The form at the end of any page, if profile = outside but not your own profile, --}}
      {{-- @if(Request::path() == '/members/profile') --}}
      <div class="messages">
        <form class="send_message" method="post">
          @csrf
           <input type="hidden" name="answer_id" value="98">
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
    </div>
@endif




      {{-- The Form For Replying --}}

      @if(isset($profileUser) && Auth::user()->id == $profileUser->id )
@else


      <div class="messages">
       <form class="send_message" method="post"  style="display: none">
        @csrf
        <input type="hidden" name="answer_id" value="99">
        <input type="hidden" name="tab_width" value="100">
        <textarea name="message"></textarea>
        <br/><br/>
        <div style="text-align: center">
          <div class="blue_button" id="sendMessagePublic">
            <b>Send</b>
          </div>
          <div class="blue_button"  id="sendMessagePrivately">
            <b>Send Privately</b>
          </div>
        </div>
        <br/>
      </form>
    </div>


    @endif