<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_urls', function (Blueprint $table) {
            $table->increments('id');//Id for the Urls
            $table->string("short");//The Short Url to be generated
            $table->string("long");//The long url to be received
            $table->integer("times");//How many times this url have been accessed
            $table->dateTime("accessed")->nullable();;//last time accessed;
            $table->string("description",140);//A little description of the Url
            $table->string("private");//If link should be showed in Recently Accessed our Most Accessed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_urls');
    }
}
