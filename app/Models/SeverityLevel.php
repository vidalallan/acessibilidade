<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeverityLevel extends Model
{
    use HasFactory;

    protected $table = "tbSeverityLevel";

    protected $fillable = ['id','deleted','severity','description','userId','created_at','updated_at'];

    public $timestamps = true;
}
