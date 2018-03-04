<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  @stack('style')
</head>
<body>
  <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">TheCodeMan</a>
        <ul id="nav-mobile" class="right">
          <li><a href="{{url('blogs/list')}}">Blogs</a></li>
          
        </ul>
      </div>
    </nav>
  <div class="container py3">
      @yield('content')
  </div>
  <script>
  var site_url = "{{url('/')}}"
  </script>
  <script src="{{asset('js/app.js')}}"></script>
  @stack('scripts')
</body>
</html>

