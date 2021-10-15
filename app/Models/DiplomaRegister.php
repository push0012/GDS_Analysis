<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaRegister extends Model
{
    use HasFactory;

    protected $table = 'diploma_registers';

    //protected $primaryKey = 'stu_id';

    protected $fillable = [
        'dip_title', 
        'dip_medium',
        'dip_duration',
        'dip_effective_date',
        'dip_job_preference',
        'dip_reg_no',
        'dip_reg_date',
        'year',
        'deleted',
        'user',
        'stu_id',
        'ins_id'
    ];
}
