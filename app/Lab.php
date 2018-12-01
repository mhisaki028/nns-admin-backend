<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'lab_name', 'lab_desc', 'lab_loc'
    ];

    protected $table = 'laboratories';
    protected $primaryKey = 'lab_id';
}
