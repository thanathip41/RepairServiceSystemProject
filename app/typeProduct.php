<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeProduct extends Model
{
    protected $table='typeProduct';
    public function typeCheck(){      
        return $this->hasMany(typeProduct::class);
    }
    
}
