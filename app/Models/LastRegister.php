<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastRegister extends Model
{
    use HasFactory;

    protected $table = 'last_registers';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        //'ins_id', 
        'last_record' 
        
    ];
}
