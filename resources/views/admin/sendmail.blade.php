    @include('admin.layout.header')



    
<div align="center">
  <form method="post" action="/sendmail/queue">
    @csrf






      <div class="line" style="margin-bottom: 6px;">
        <div class="name input">Url You Are Advertising</div>
        <div class="value">
          <input type="text" name="url" id="url" value="http://" style="width: 240px;"/>
        </div>
      </div>
      <div class="line" style="margin-bottom: 6px;">
        <div class="name input">Your subject</div>
        <div class="value">
          <input type="text" name="subject" id="subject" value="" style="width: 240px;"/>
        </div>
      </div>


<textarea id="bodytext"  cols=65 rows=15 name='message'>

</textarea>

<br><br>
    
        <button class="blue_button" style="margin: 0 35px;" name="send" value="send" >
          Send message
        </button>

        <button class="blue_button"  style="margin: 0 35px;" name="preview" value="preview"> 
          Preview Mail
        </button>
    </form>
  </div>
</form>



  @include('admin.layout.footer')