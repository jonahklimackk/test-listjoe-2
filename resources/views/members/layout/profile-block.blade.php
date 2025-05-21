<div style="width: 960px;margin:0 auto">
  <div class="profile_block">
    <div class="head">
      <div class="logged">
        <u>online</u>
        {{-- <b>{{ Auth::user()->name }}</b> --}}
      </div>

      <a href="log/out">Log Out </a>
    </form>    
  </div>
  <div class="name">
    {{ Auth::user()->name }}
  </div>
  <div class="value" style="margin-top: 19px;">
    {{ Auth::user()->membership }}
  </div>
  <div class="value" style="margin-top: 47px;">
    {{ Auth::user()->unreadMessages() }}
  </div>
  <div class="rating">
    {{ Auth::user()->getRating() }}
  </div>
  {{-- 188 is right side --}}
  {{-- 151 is left side --}}
  {{-- so 37 total so rating / 3 --}}

  <?php
  $post = App\Models\Post::where('user_id', Auth::user()->id)->get()->first();
  ?>
  <div class="arrow" style="margin-left: {{ (Auth::user()->getRating()/3)+151 }}px"></div>



  <a href="{{ config('listjoe.member_profile') }}{{ Auth::user()->username }}">


   @if (!is_null($post))
   <img src="{{$post->getFirstMediaUrl('images', 'thumb')}}" width='135' height='135' class='photo'/>
   @else
   <img src="{{ Auth::user()->profile_photo_url }}" width='135' height='135' class='photo'/> 
   @endif



   <div class="round_photo"></div>
 </a>
</div>
</div>
