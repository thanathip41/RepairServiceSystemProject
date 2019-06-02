<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roleCheck extends Model  // ชื่อ class ไปเรียก
{
    protected $table='role_user';
    public function userCheck(){   //ทำให้ typeProduct table รู้จักค่า type_id 
        return $this->hasMany(roleCheck::class,'roleCheck');
    }
}
