<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //collects the URLs from the database
        $accessed = Url::getUrlsByAccessed();
        $times = Url::getUrlsByTimes();
        //Return the view with the urls
        return view("urlshortener.index", [
          "recentUrl" => $accessed,
          "mostAccessed" => $times
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("urlshortener.create");//Returning the Create view for user
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Pass the data from the request object to variables
        $long = $request->input("long");
        $short = $request->input("short");
        $description = $request->input("description");
        $private = (String)$request->input("private");

        $result = Url::checkShort($short);
        if($result){
          //if the result is true, return "used" to the client
          return "used";
        }else{
          //if it´s false, continues.
          //Checks to see if long url from the Request Object have valid Url syntax
          if(filter_var($long, FILTER_VALIDATE_URL)){
            if($short == ""){
              $short = Url::fetchWord();
            }
          //If It does, create a new url in the database, through the function from the Url model and returns "Ok" to the client
            Url::createUrl($long,$short,0,date("Y-m-d H:i:s"),$description,$private);
            return "ok:".$short;
          }else{
            //If it doesn't, returns "invalid" to the client
            return "invalid";
          }
        }
    }


    //Redirect the shortened URL to the correspondent Long URL
    public function shortened($shortUrl)
    {
      //look for the URL in the database
      $url = Url::getShort($shortUrl)[0];
      if($url == false){
        //if doesn´t find it, returns a 404
        abort(404);
      }else{
        //if it do find it,it increases the Times counter and update the Accessed field as well
        $url->times += 1;
        $url->accessed = date("Y-m-d H:i:s");
        $url->save();
        return redirect($url->long);
      }
    }

    //shows a help page for the user learn how the system works
    public function help(){
      return view("urlshortener.help");
    }
}
