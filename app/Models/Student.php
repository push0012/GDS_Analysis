<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $primaryKey = 'stu_id';

    protected $fillable = [
        //'stu_id', 
        'stu_title',
        'stu_name',
        'sex',
        'dob',
        'nic',
        'address',
        'telephone',
        'email',
        'deleted',
        'user',
        'ds_id',
        'dv_id'
    ];
}
