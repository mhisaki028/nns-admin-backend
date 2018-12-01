<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected $fillable = [
        'patient_name', 'patient_address', 'lab', 'service', 'totalfee', 'medtech', 'payment'
    ];

    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $foreignKey = ['lab', 'medtechs', 'services'];
}
