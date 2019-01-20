{{-- This View is for creating a new URL --}}
@extends('urlshortener.layout'){{-- Calling the layout file --}}

@section('title', "Help"){{-- Defining the title --}}

@section('token'){{--Csrf Token--}}
@endsection

@section('content') {{-- Defining the body content --}}

<div id="help" class="container">
  <div class="row">
    <div class="col-12">
        <h1>How to use?</h1>
    </div>
    <div class="col-6">
        <h1>Creating</h1>
        <div class="left">
        <b>></b> To create a shortened URL, just go to the Create Page <br>
        <b>></b> You can pick any word, but you can´t use a word that has already been used, and you also can´t choosethe word Urls, because the system already use it.<br>
        <b>></b> If you don't pick a word, the system will automatically pick one<br>
        <b>></b> If a problem happen while creating the shortened URL, the system will stop the creation and warn you <br>
        </div>
    </div>
    <div class="col-6">
        <h1>Viewing</h1>
        <div class="left">
        <b>></b> In the URL list page you can see two list of shortened URLs, the recently accessed and the most accessed URLs <br>
        <b>></b> You can change between both lists by clicking in the buttons<br />
      </div>
    </div>
  </div>
</div>

@endsection
{{--Putting any needed scripts in the page--}}
@section('scripts')
@endsection
