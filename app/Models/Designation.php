<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use HasFactory;


    protected $table='designations';
    protected $fillable = [
        'name',
        'urdu_name',
        'code',
        'responsibilities',
    ];

}
