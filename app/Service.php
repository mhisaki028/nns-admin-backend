<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_name', 'service_desc', 'service_price'    
    ];

    protected $table = 'services';
    protected $primaryKey = 'service_id';
}
