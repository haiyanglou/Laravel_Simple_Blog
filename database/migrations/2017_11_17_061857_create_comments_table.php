<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');            
            $table->timestamps();              
        });
        
        Schema::table('comments', function ($table) {    
            //$table->foreign('name')->references('name')->on('users')->onDelete('no action');
            //$table->foreign('email')->references('email')->on('users')->onDelete('NO ACTION');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropForeign(['name']);   
        //Schema::dropForeign(['email']);                 
        Schema::dropIfExists('comments');
    }
}
