<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusCheck extends Model
{
    protected $table='statusCheck';
    
    public function statusCheckname(){   //ทำให้ typeProduct table รู้จักค่า type_id 
        return $this->hasMany(statusCheck::class);
    }
}
