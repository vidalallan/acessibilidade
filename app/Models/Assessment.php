<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $table = "tbAssessment";

    protected $fillable = [
        'idAssessment',
	    'creationDate',
	    'deleted',
	    'idIssue',
	    'problem',
	    'justification'
    ];
    
    public $timestamps = false;
}
