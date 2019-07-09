<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class depart_id extends Model
{
    protected $table='department_name';
    public function depart(){  
        return $this->hasMany(depart_id::class,'department_id');
    }
    
}
