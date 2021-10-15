<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;

    protected $table = 'streams';

    protected $primaryKey = 'str_id';

    protected $fillable = [
        'str_id', 
        'str_name',
        'deleted',
        'user'
    ];
}
