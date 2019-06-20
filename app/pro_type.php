<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pro_type extends Model
{
    protected $table='device_type';
    public function typeCheck(){       ////ทำให้ typeProduct table รู้จักค่า type_id 
        return $this->hasMany(pro_type::class,'device_id');
    }
    
}
