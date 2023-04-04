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
        Schema::create('tbAssessment', function (Blueprint $table) {
            $table->id();            
            $table->date('creationDate');
            $table->tinyInteger('deleted');
            $table->unsignedBigInteger('issueId'); 
            $table->tinyInteger('problem');            
            $table->string('justification');                                  
            $table->unsignedBigInteger('userId'); 
            $table->foreign('issueId')->references('id')->on('tbIssue');                                             
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
        Schema::dropIfExists('tbAssessment');
    }
};
