@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')



<div class="wrapper">
  <style>
    .loginad_table .name {
      vertical-align: middle;
      font-weight: bold;
      font-size: 12px;
      width: 150px;
    }
    .loginad_table textarea {
      width: 467px;
      height: 126px;
    }
  </style>
  <div class="description">
    <h1>Your List Joe Login Ads</h1>
    <div class="par">
      Here is where you can set up and manage your List Joe login ad.
      These ads are exclusive to gold member’s only, and they work extremely well.
    </div>
    <div class="par">
      Be sure to use some of your best ad copy and highest converting website to maximize your results. This ad will accept 245 characters maximum so keep it short, sweet, and make it catchy.
    </div>
    <div class="par">
      Set up your login ad now:
    </div>
  </div>

  @include('members.layout.form-feedback')


  {{-- Stats Table --}}
  @if(isset($loginAd) && !$edit)

  <table class="main_table">
    <thead>
      <tr>
        <th class="global_head_left_border"></th>
        <th class="">Headline</th>
        <th class="">Impressions</th>
        <th class="">Clicks</th>
        <th class="">Click %</th>
        <th class="">Manage</th>
        <th class="global_head_right_border"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="global_str_left_border"></td>
        <td>{{ $loginAd->headline }}</td>
        <td style="text-align: center">{{ $loginAd->views }}</td>
        <td style="text-align: center">{{ $loginAd->clicks }}</td>
        <td style="text-align: center">
          @if($loginAd->views)
          {{ number_format(($loginAd->clicks / $loginAd->views)*100,2) }}
          @else
          0
          @endif
        </td>
        <td style="text-align: center">
          <a href="/members/loginads/edit/1">Edit</a>
          <a href="/members/loginads/delete">Delete</a>
        </td>
        <td class="global_str_right_border"></td>
      </tr>
    </table>

    @else

    {{-- form --}}
    <form id="addloginadForm" class="loginad" method="post" action="/members/loginads" style="margin-left: 20px">
      @csrf
      <table class="loginad_table">
        <tr>
          <td class="name">
            Headline:
          </td>
          <td>
            @if(isset($loginAd))
            <input name="headline" maxlength="500" value="{{ $loginAd->headline }}" style="width: 250px;"/>
            @else
            <input name="headline" maxlength="500" value="" style="width: 250px;"/>
            @endif
          </td>
        </tr>
      </table>

      <br><br>


<script>
  tinymce.init({
    selector: 'textarea',
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
  
    
      @if(isset($loginAd))
      <textarea style="width: 452px;height: 218px;max-width: 52px;
      min-width: 452px;"  name="text">
      {{ $loginAd->body }}
    </textarea>
    @else
    <textarea style="width: 452px;height: 218px;max-width: 52px;
    min-width: 452px;" name="text">
  </textarea>


  @endif

  <br><br>
  <table class="loginad_table">
    <tr>
      <td class="name">
        URL you are advertising:
      </td>
      <td>
        @if(isset($loginAd))
        <input name="link" maxlength="255" value="{{ $loginAd->url }}" style="width: 250px;">
        @else
        <input name="link" maxlength="255" value="http://" style="width: 250px;">
        @endif
      </td>
    </tr>
  </table>
  @include('members.layout.form-errors')
  <br/>
  <div style="text-align: center">
    <div class="blue_button" id="previewButton">Preview</div>
    <div class="blue_button" data-submit="loginad">Add New Login Ad</div>
  </div>
</form>
@endif
<br>
<!-- <div class="par">
  Note that you must save your changes 
  in order to preview them.
</div> -->
</div>

<script>
  $(document).ready(function(){
    $('#previewButton').click(function(){
      $('#addloginadForm')
      .attr('target','_blank')
      .attr('action','/members/loginad/preview')
      .submit()
      .attr('target','')
      .attr('action','/members/loginads');
    })
  })

</script>


@include('members.layout.sidebar-spotlight')
@include('members.layout.footer')