<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeRegister extends Model
{
    use HasFactory;

    protected $table = 'degree_registers';

    //protected $primaryKey = 'stu_id';

    protected $fillable = [
        'deg_title', 
        'deg_medium',
        'deg_type',
        'deg_class',
        'deg_effective_date',
        'deg_job_preference',
        'deg_reg_no',
        'deg_reg_date',
        'year',
        'deleted',
        'user',
        'stu_id',
        'str_id',
        'ins_id'
    ];
}
