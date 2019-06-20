<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusCheck extends Model
{
    protected $table='status_type';
    public function statusCheckname(){ 
        return $this->hasMany(statusCheck::class,'status_id');
    }
}
