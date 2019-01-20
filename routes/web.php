<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("/Urls");//redirect to the correct part of the application
});

//Using routing conventions, therefore can use Route::resource
Route::resource("/Urls", "UrlsController");

Route::get("/Url/Help", "UrlsController@help");

//Getting the Shortened URLs
Route::get("/{shortUrl}", "UrlsController@shortened");
