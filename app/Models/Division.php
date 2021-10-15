<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';

    protected $primaryKey = 'dv_id';

    public $timestamps = false;

    protected $fillable = ['dv_id', 'dv_name', 'ds_id'];
}
