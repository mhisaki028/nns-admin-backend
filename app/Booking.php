<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected $fillable = [
        'patient_name', 'patient_address', 'patient_phone','lab', 'service', 'totalfee', 'medtech', 'payment'
    ];

    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $foreignKey = ['lab', 'medtechs', 'services'];
}
