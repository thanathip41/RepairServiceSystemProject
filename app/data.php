<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $fillable=['productCode','problem','name','type_id',];
     // 'repairman','statusCheck', 'method','remark' ไม่ได้ถูกส่ง
    
    public function typeCheck(){   //ทำให้ typeProduct table รู้จักค่า type_id 
    return $this->belongsTo(typeProduct::class,'type_id');
}
public function statusCheckname(){   //ทำให้ typeProduct table รู้จักค่า type_id 
    return $this->belongsTo(statusCheck::class,'statusCheck');
}
}