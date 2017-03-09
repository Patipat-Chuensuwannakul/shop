<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laravel 5 -@yield('page_title')</title>
  {!! HTML::style('bootstrap/css/bootstrap.min.css') !!}
</head>
<body>
<div class="container">
  @yield('content')
</div>
  {!! HTML::script('js/jquery.min.js') !!}
  {!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
</body>
</html>