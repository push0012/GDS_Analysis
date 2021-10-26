<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;

    protected $table = 'institutes';

    protected $primaryKey = 'ins_id';

    protected $fillable = [
        //'ins_id', 
        'ins_name', 
        'ins_type',
        'ins_category',
        'deleted',
        'user'
    ];
}
