<!DOCTYPE html>
{{--
  This is the layout for the pages of this application
--}}
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', "Url Shortener"){{-- Here the other pages will insert their title --}}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/url_index.css') }}">
    @yield('token')
  </head>
  <body>
    <div id="top_bar">
      {{-- This div contains the website logo --}}
      <div id="Logo_Container" >
        <h1> URL SHORTENER </h1>
      </div>
      {{-- This div the website links  --}}
      <div id="links">
        <span><a href="/Urls/create">Create</a></span>
        <span><a href="/Urls">URL List</a></span>
        <span><a href="/Url/Help">Help</a></span>
      </div>
    </div>
    @yield('content'){{-- Here the other pages will insert their content --}}
  </body>
  <script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.js') }}"></script>
  @yield('scripts')
</html>
