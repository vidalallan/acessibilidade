<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = "tbIssue";

    protected $fillable = ['idIssue','creationDate','deleted','title','description','appFieldId','appFieldName','printScreen','idDevice','devideModel','version','appTitle','linkApp'];
    
    public $timestamps = false;

}
