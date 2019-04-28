<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_id extends Model
{
    protected $table='type_id';
    public function typeCheck(){       ////ทำให้ typeProduct table รู้จักค่า type_id 
        return $this->hasMany(type_id::class,'typename');
    }
    
}
