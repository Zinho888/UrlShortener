{{-- This View is for creating a new URL --}}
@extends('urlshortener.layout'){{-- Calling the layout file --}}

@section('title', "Create Shortened Url"){{-- Defining the title --}}

@section('token'){{--Csrf Token--}}
<meta name='_token' content='{{ csrf_token() }}' />
@endsection

@section('content') {{-- Defining the body content --}}
  {{-- Page container --}}
  <div id="createContainer" class="container-fluid">
    {{-- Create Shortened URL form --}}
    <h1>Create New Short URL</h1><br>
    <form action="/Urls" method="post" id="create">
      {{ csrf_field() }} {{--Token for authentication--}}
      <input type="text" id="long" name="long" placeholder="Type your long url (Required)"><br>{{--Long Url--}}
      <input type="text" id="short" name="short" placeholder="Type your short url (Optional)"><br>{{--Shortened Url--}}
      <input type="text" id="description" name="description" maxlength="140" placeholder="Type a description for your url (Optional)"><br>{{--Description about the URL--}}
      <input type="checkbox" id="private"  name="private"> Private?<br>{{--Private: If the url can show in the lists--}}
      <p id="formWarns" class=""></p>{{--Display messages if needed--}}
      <input type="button" id="submitBtn" onclick="testUrl()" class="btn" name="confirm" value="Shorten">{{--Submit Button, is calling Ajax function in the createUrl.js file--}}
    </form>
  </div>

{{-- A Modal to show the user his new Shortened URL --}}
  <div id="modal_background">
  <div id="modal">
    <div id="modal-header">
      <h1 id="modal-header-title">New URL</h1>
    </div>
    <div id="modal-body">
      Your new shortened URL is <a id="modal-body-url" href="">{{env('APP_URL')}}:{{env('APP_PORT')}}/</a><br>
      <input type="button" id="modal-body-btn" value="Ok">
    </div>
  </div>
</div>

@endsection
{{--Putting any needed scripts in the page--}}
@section('scripts')
<script type="text/javascript" src="{{ asset('/js/createUrl.js') }}"></script>
@endsection
