<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\File;

class Url extends Model
{
    protected $table = "_urls";// Setting the table

    //Function to create Shortened Url
    public static function createUrl($long, $short, $times, $accessed, $description, $private){
      //Create a new Url Object and set the Object's variables to their´s correspondents parameters
      $newUrl = new Url;
      $newUrl->long = $long;
      $newUrl->short = $short;
      $newUrl->times = $times;
      $newUrl->accessed = $accessed;
      $newUrl->description = $description;
      $newUrl->private = $private;
      //Then saves the object to the database
      $newUrl->save();
    }

    //Function to check if the shortened url string is been used by another shortened url
    public static function checkShort($short){
      //Search for a Short field equal to the short parameter
      $result = Url::where("short", "=", $short)->get();
      // //Check the search result
      if(!count($result) && $short != "Urls"){
        //If it doesn´t find anything, returns false, to indicate that the shortened url is not been used
        return false;
      }else{
        //If it does, returns true, to indicate that the shortened url is been used
        return true;
      }
    }

    //Function that get a non used word from the list
    public static function fetchWord(){
      //Assign the file to a variable
      $file = File::get(storage_path('eff_short_wordlist_2_0.txt'));
      //Check every line until it gets and non used word
      foreach(explode("\n", $file) as $key=>$line){
        $word = substr($line, 5);;
        if(!Url::checkShort($word)){//If it finds an non used word, it breaks the foreach loop
          break;
        }
      }
      return $word;//and then returns the loop
    }

    //function that finds a shortened URL
    public static function getShort($short){
      $url = new Url;//Defines URL obj
      $result = $url->where("short","=",$short)->get();//Make a search
      if(count($result)){//If the URL is found in the database return it
        return $result;
      }else{//If not, returns false
        return false;
      }
    }

    //function that get 10 URL´s organized by the most recent accesses
    public static function getUrlsByAccessed()
    {
      //Get the URLs from the database
      $accessed = Url::take(10)->where("private","=","false")->orderBy("accessed","cres")->get();
      //Checks if the results from the database aren´t empty
      if(!count($accessed)){
        //If the results are empty, returns false
        return false;
      }else{
        //Substitute the value of the private field from String to boolean
        foreach($accessed as $key => $s){
          if($s->private == "true"){
            $s->private = true;
          }else{
            $s->private = false;
          }
        }
        //Returns the changed object
        return $accessed;
      }
    }

    //function that get 10 URL´s organized by the most accessed
    public static function getUrlsByTimes(){
      $times = Url::take(10)->where("private","=","false")->orderBy("accessed","asc")->get();
      //Checks if the results from the database aren´t empty
      if(!count($times)){
        //If the results are empty, returns false
        return false;
      }else{
        //Substitute the value of the private field from String to boolean
        foreach($times as $key => $s){
          if($s->private == "true"){
            $s->private = true;
          }else{
            $s->private = false;
          }
        }
        //Returns the changed object
        return $times;
      }
    }


}
