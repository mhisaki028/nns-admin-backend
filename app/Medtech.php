<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medtech extends Model
{
    protected $fillable = [
        'medtech_name', 'medtech_no', 'lab_designation', 'time_avail'
    ];

    protected $table = 'medtechs';
    protected $primaryKey = 'medtech_id';
 
  
}
