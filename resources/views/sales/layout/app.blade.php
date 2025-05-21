<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ListJoe v3 - Socially Profitable Email Marketing</title>
        <link rel="stylesheet" href="/css/reset.css" type="text/css" />
        <link rel="stylesheet" href="/css/outside.css" type="text/css" />
        <script type="text/javascript" src="/js/jquery.min.7.1.js"></script>
        <script type="text/javascript" src="/js/outer.js"></script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-35191250-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>

{!! RecaptchaV3::initJs() !!}

<!-- <script>
    document.addEventListener("DOMContentLoaded", () => {
  document.addEventListener("mouseout", (event) => {
    if (!event.toElement && !event.relatedTarget) {
      window.open("https://klickdream.com/aff/klickdream/exitpop","_self");  
      setTimeout(() => {
        show();
      }, 1000);
    }
  });
});
</script> -->


    </head>
    <body>
<!--         <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=158655317520785";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="background"></div> -->



<div class="main">
  <div class="background"></div>
  <div class="content">   
    <a href="/"><img src="/img/logo.png" class="logo"/></a>
    <a href="/login" style="z-index: 100000;"><img src="/img/outside/memlogin.png" class="memlogin"/></a>
    <style>
    .bbb{
      background: lightPink;
      text-shadow: white 0 1px;
      padding: 10px;
    }
    .ques {
      color:#f3f400;
      cursor:pointer
    }
    .signup_error {
      width: 474px;
      margin: 20px auto;
      border: 2px solid red;
      background: #FFBDBD;
      padding: 20px;
      line-height: 1.5em;
    }
  </style>
  <div class="headline">
    Send your email to 500 home-based business owners right now…
</div>



@yield('content')



        <div class="footer">
            <div class="background"></div>
            <ul class="footer-menu">
                <li><a href="/signup">Signup</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/terms">Terms of Use</a></li>
                <li><a href="/testimonials">Testimonials</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
    </body>
</html>
