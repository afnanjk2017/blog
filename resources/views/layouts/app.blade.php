<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Afnan Blog</a>
    
    <a  href="{{route('posts.index')}}" class="btn btn-outline-success me-2" type="button"> All Posts</a>
  
  </div>
  </nav>

  @yield('content')
  
  </body>
</html>