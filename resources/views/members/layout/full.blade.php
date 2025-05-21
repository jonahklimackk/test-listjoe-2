@include('members.layout.header')

@include('members.layout.menu')

@include('members.layout.sidebar-vda')


<!-- this stupid fucking wrapper is what keeps it aligned, but for the home page its before the spotlight ads, on other pages, it's after wtf -->
<div class="wrapper">
  <script>
    var timeleft = 100949;

    $(document).ready(changeTimeLeft)
    window.setInterval("changeTimeLeft()", 1000);
  </script>

@include('members.layout.spotlight-ads')

@yield('content')

@include('members.layout.footer')










