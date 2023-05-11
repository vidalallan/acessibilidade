<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = "tbIssue";

    protected $fillable = ['id','problemId ','creationDate','deleted','appFieldId','appFieldName','printScreen','patternId','patternVersion','patternVersionDetailts','idDevice','devideModel','version','appTitle','linkApp','toolUsed','tool_problem','tool_problem_version','flow_identify_problem','assistive_technology_tool','tool_assistive','tool_assistive_version','origin','userId','created_at','updated_at'];
    
    public $timestamps = false;

}
