<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class depart_id extends Model
{
    protected $table='depart_id';
    public function depart(){       ////ทำให้ typeProduct table รู้จักค่า type_id 
        return $this->hasMany(depart_id::class,'department');
    }
    
}
