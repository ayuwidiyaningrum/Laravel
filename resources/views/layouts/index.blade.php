<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>App Laravel 8</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">

    @include('layouts.header')
    @include('layouts.menu')
    <br/>
	<div class="row">
		<div class="col-md-9">
        @yield('content')
        </div>
        @include('layouts.sidebar')
    </div>
    <br/>
    @include('layouts.footer')
</div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

  </body>
</html>