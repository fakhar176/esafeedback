<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory;

    protected $table='provinces';

    protected $fillable = [
        'name',
        'urdu_name',
        'code',
        'capital',
    ];


    public function districts()
    {
        return $this->hasMany(District::class);
    }

}
