<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;


    protected $table='districts';


    protected $fillable = [
        'name',
        'urdu_name',
        'code',
        'province_id',
    ];


    public function province()
    {
        return $this->belongsTo(Province::class);
    }

}
