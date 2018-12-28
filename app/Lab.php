<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'lab_name', 'user_id'
    ];

    protected $table = 'laboratories';
    protected $primaryKey = 'lab_id';
    protected $foreignKey = 'user_id';

    
   
}
