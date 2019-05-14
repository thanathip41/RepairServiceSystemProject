<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $fillable=['productCode','problem','type_id','id','idM','img'];// 'repairman','statusCheck', 'method','remark' ไม่ได้ถูกส่ง
    
     public function idMtest()
    {   
        return $this->belongsTo(User::class,'id');   
    }

    public function typeCheck()
    {  
    return $this->belongsTo(type_id::class,'type_id'); // ตัวแปร เทียบกับ typeProduct
    }
    
    public function statusCheckname()
    { 
    return $this->belongsTo(statusCheck::class,'statusCheck');
    }

    public function users()
    { 
    return $this->belongsTo(User::class,'idM'); //('App\User','idM','id');
    }

   protected $primaryKey="id";   // php มอง id เป็น int 
   public $incrementing =false;

protected $dates = ['date_begin', 'date_end'];
}