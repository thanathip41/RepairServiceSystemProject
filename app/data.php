<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $fillable=['productCode','problem','name','type_id','id','email'];
     // 'repairman','statusCheck', 'method','remark' ไม่ได้ถูกส่ง
    

    public function typeCheck()
    {  
    return $this->belongsTo(typeProduct::class,'type_id'); // ตัวแปร เทียบกับ typeProduct
    }
    
    public function statusCheckname()
    { 
    return $this->belongsTo(statusCheck::class,'statusCheck');
    }

    public function testx()
    { 
    return $this->belongsTo(test::class,'xxx');
    }

   protected $primaryKey="id";   // php มอง id เป็น int 
   public $incrementing =false;

protected $dates = ['date_begin', 'date_end'];
}