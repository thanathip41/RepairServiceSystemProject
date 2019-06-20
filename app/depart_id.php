<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class depart_id extends Model
{
    protected $table='department_name';
    public function depart(){       ////ทำให้ typeProduct table รู้จักค่า type_id 
        return $this->hasMany(depart_id::class,'department_id');
    }
    
}
