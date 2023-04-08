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
            $table->string('title')->nullable(); 
            $table->string('description',2000)->nullable();
            $table->string('appTitle')->nullable();
            $table->string('appFieldId')->nullable();
            $table->string('appFieldName')->nullable();
            $table->string('printScreen',2000)->nullable();
            $table->integer('idDevice');
            $table->string('pattern')->nullable();
            $table->string('patternVersion')->nullable();
            $table->string('patternVersionDetailts',2000)->nullable();
            $table->string('devideModel')->nullable();
            $table->string('version')->nullable();
            $table->string('linkApp',2000)->nullable();
            $table->string('origin')->nullable();  
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
