<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>{{$title}}</title>
<link rel="stylesheet" href="{{asset('assets/css/foundation.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
<script src="{{asset('assets/js/vendor/modernizr.js')}}"></script>
</head>
<body>

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="{{URL::to('/')}}">Home Page</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
    @if(Sentry::check())
    <li><a href="#">Profile</a></li>
      <li class="has-dropdown">
        <a href="#">{{Sentry::getUser()->email}}</a>
        <ul class="dropdown">
          <li><a href="{{URL::to('/logout')}}">Logout</a></li>
          <li><a href="{{URL::to('/admin')}}">Dashboard</a></li>
        </ul>
      </li>
    @else
        <li><a href="#">Sign up</a></li>
        <li><a href="{{URL::to('/login')}}">Log in</a></li>
    @endif
    </ul>

    <!-- left nav section -->
    <ul class="left">
      <li><a href="#">picture</a></li>
        <li class="has-form">
          <div class="row collapse">
            <div class="large-8 small-9 columns">
              <input type="text" placeholder="input something!" id="ajaxSearchText">
            </div>
            <div class="large-4 small-3 columns">
              <a href="{{URL::to('/search')}}" class="success button expand" id="ajaxSearch">Search</a>
            </div>
          </div>
        </li>
    </ul>
  </section>
</nav>

<div class="row">
<div class="large-12 columns">
<h1>Blog <small>This is my blog. </small></h1>
<hr/>
</div>
</div>
<div class="row">


{{$main}}


</div>
<footer class="row">
<div class="large-12 columns">
<hr/>
<div class="row">
<div class="large-6 columns">
<p>&copy; Copyright.</p>
</div>
<div class="large-6 columns">
<ul class="inline-list right" id="imgIcon">
<li><a href="#"><img src="{{asset('assets/img/twitter.png')}}"></a></li>
<li><a href="#"><img src="{{asset('assets/img/facebook.png')}}"></a></li>
<li><a href="#"><img src="{{asset('assets/img/email.png')}}"></a></li>
</ul>
</div>
</div>
</div>
</footer>


<script src="{{asset('assets/js/vendor/jquery.js')}}"></script>
<script src="{{asset('assets/js/foundation.min.js')}}"></script>
<script>
    $(document).foundation();
  </script>
<script src="{{asset('assets/js/vendor/jquery.js')}}"></script>
<script src="{{asset('assets/js/foundation/foundation.js')}}"></script>
<script>
      $(document).foundation();

      var doc = document.documentElement;
      doc.setAttribute('data-useragent', navigator.userAgent);
    </script>
<script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>
