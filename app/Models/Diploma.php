<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    protected $table = 'diplomas';

    protected $primaryKey = 'dip_id';

    protected $fillable = [
        //'dip_id',
        'dip_title',
        'deleted',
        'user'
    ];
}
