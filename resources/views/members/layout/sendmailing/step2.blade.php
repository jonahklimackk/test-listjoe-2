
    

    <div class="cont">
      <div class="line" style="margin-bottom: 6px;">
        <div class="name input">Your 
        Previous Ads</div>
        <div class="value">
          <select id="previous_mail" data-mail_id="" style="width: 240px;">
            <option value ="-1">Select previous ads</option>
            @if(isset($previousMailings))
            @foreach($previousMailings as $previous)
            <option data-mail_id="{{ $previous->id }}">{{ $previous->subject }}</option>
            @endforeach
            @endif
          </select>
        </div>
      </div>
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
      <br><br>
      <div class="fs13">
        To personalize the subject and/or message body, enter [FIRST_NAME]. <br/>
        It must be [FIRST_NAME] exactly or it will not work!
      </div>
      <br/><br>

      @if(Auth::user()->membership == 'free')
      <div style="color:red">
        <b>Want to fully unlock our email templates? As an upgraded member you can change your email fonts, colors and other cool features.</b>
      </div>
      <br>
      <a href="/members/upgrade" class="href1"><b>Check out our upgrade options.</b></a>
      @endif
      <br/><br/>  

      <div class="par">Your Message:</div>




<script>
  tinymce.init({
    selector: '#bodytext',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      // Try the most popular premium features until Dec 3, 2024:

      // Early access to document converters
      
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    exportpdf_converter_options: { 'format': 'Letter', 'margin_top': '1in', 'margin_right': '1in', 'margin_bottom': '1in', 'margin_left': '1in' },
    exportword_converter_options: { 'document': { 'size': 'Letter' } },
    importword_converter_options: { 'formatting': { 'styles': 'inline', 'resets': 'inline', 'defaults': 'inline', } },
  });
</script>



@if(Auth::user()->isUpgradedToAtLeast('bronze'))
<textarea id="bodytext"  cols=65 rows=15 name='message'>
{{ $mailing->message ?? ''}}
</textarea>
@else
<textarea cols=60 rows=35 name='message'>
{{ $mailing->message ?? ''}}
</textarea>
@endif







      </div>
    </div>

    @include('members.layout.form-errors')