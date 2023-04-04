<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;

    protected $table = "tbPattern";

    protected $fillable = ['idPattern','pattern','deleted'];

    public $timestamps = false;
}
