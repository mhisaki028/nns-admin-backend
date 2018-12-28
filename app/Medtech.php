<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medtech extends Model
{
    protected $fillable = [
        'medtech_name', 'medtech_no', 'time_avail', 'status'
    ];

    protected $table = 'medtechs';
    protected $primaryKey = 'medtech_id';
    protected $foreignKey = 'lab_designation';
 
  
}
