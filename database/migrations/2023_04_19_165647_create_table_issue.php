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
            $table->unsignedBigInteger('problemId');
            $table->string('title')->nullable(); 
            $table->string('description',2000)->nullable();
            $table->string('appTitle')->nullable();
            $table->string('appFieldId')->nullable();
            $table->string('appFieldName')->nullable();
            $table->string('printScreen',2000)->nullable();
            $table->integer('idDevice');
            $table->unsignedBigInteger('patternId');
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
            $table->foreign('problemId')->references('id')->on('tbProblem');
            $table->foreign('patternId')->references('id')->on('tbPattern');
            $table->string('tool_problem')->nullable();	
            $table->string('tool_problem_version')->nullable();	
            $table->string('flow_identify_problem')->nullable();	
            $table->tinyInteger('assistive_technology_tool')->nullable();
            $table->string('tool_assistive')->nullable();	
            $table->string('tool_assistive_version')->nullable();
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
