<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbIssue', function (Blueprint $table) {
            
            $table->id();            
            $table->date('creationDate');
            $table->tinyInteger('deleted');
            $table->string('title'); 
            $table->string('description',2000);
            $table->string('appTitle');
            $table->string('appFieldId');
            $table->string('appFieldName');
            $table->string('printScreen',2000);
            $table->integer('idDevice');
            $table->string('pattern');
            $table->string('patternVersion');
            $table->string('patternVersionDetailts',2000);
            $table->string('devideModel');
            $table->string('version');
            $table->string('linkApp',2000);
            $table->string('origin');  
            $table->unsignedBigInteger('userId');          
            $table->foreign('idDevice')->references('idDevice')->on('tbDevice');
            $table->foreign('userId')->references('id')->on('users');
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
        Schema::dropIfExists('tbIssue');
    }
};
