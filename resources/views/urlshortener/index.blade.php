@extends('urlshortener.layout'){{-- Calling the layout file --}}

@section('title', "Url Shortener"){{--Defines the Page title--}}

@section('content') {{-- Defining the body content --}}
<div id="showUrl" class="container">
  <h1>Shortened URL List</h1>
  <div id="header">
    {{--Button to show recently accessed URLs--}}
    <button type="button" id="ra_btn" class="btn">Recently Accessed</button>
    {{--Button to show most accessed URLs--}}
    <button type="button" id="ma_btn" class="btn unusedButton">Most Accessed</button>
  </div>
    {{--Recently accessed URLs--}}
    <div id="recent" class="listUrl">
      @if ($recentUrl !== false)
        @foreach ($recentUrl as $shortened)
          <div class="container urlBox">
            <div class="row">
              <div class="col-12"> <a href="/{{$shortened->short}}" class="shortLink">{{$shortened->short}}</a> </div>
              <div class="col-12"> <a href="{{$shortened->long}}" class="longLink">{{$shortened->long}}</a> </div>
              <div class="col-12"> {{$shortened->description}} </div>
              <div class="col-8">Last Access: {{$shortened->accessed}} </div>
            </div>
          </div>
        @endforeach
      @endif
      @if ($recentUrl === false)
        <h1>No URLs found</h1>
      @endif
    </div>
    {{--Most accessed URLs--}}
    <div id="accessed" style="display:none;" class="listUrl">
      @if ($mostAccessed !== false)
        @foreach ($mostAccessed as $shortened)
          <div class="container urlBox">
            <div class="row">
              <div class="col-12"> <a href="/{{$shortened->short}}" class="shortLink">{{$shortened->short}}</a> </div>
              <div class="col-12"> <a href="{{$shortened->long}}" class="longLink">{{$shortened->long}}</a> </div>
              <div class="col-12"> {{$shortened->description}} </div>
              <div class="col-4">Number of accesses: {{$shortened->times}} </div>
            </div>
          </div>
        @endforeach
      @endif
      @if ($mostAccessed === false)
        <h1>No URLs found</h1>
      @endif
    </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/js/showUrls.js') }}"></script>

@endsection

{{--
<div class="container urlBox">
  <div class="row">
    <div class="col-12"> <a href="#" class="shortLink">Short link</a> </div>
    <div class="col-12"> <a href="#" class="longLink">A very very long link</a> </div>
    <div class="col-12"> This link has the purpose of going somewhere This link has the purpose of going somewhere This link has the purpose of going somewhere This link has the purpose of going somewhere This link has the purpose of going somewhere </div>
  </div>
</div>
 --}}
