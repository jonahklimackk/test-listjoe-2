    @include('admin.layout.header')


<div align="center">
  <br><br>
<p>Hi there</p>
    
  <form method="get" action="/process/next-mailing/">
    @csrf

        <button class="blue_button" style="margin: 0 35px;" name="send" value="send" onclick="includeHidden();">
          Send message
        </button>

      


</form>


</div>


  @include('admin.layout.footer')