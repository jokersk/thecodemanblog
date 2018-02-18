<link rel="stylesheet" href="{{asset('css/app.css')}}">
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
<script src="{{asset('js/app.js')}}"></script>