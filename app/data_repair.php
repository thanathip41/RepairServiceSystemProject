<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_repair extends Model
{
    protected $table='data_repair';
    protected $fillable=['productCode','problem','device_id','id','idM','img'];// 'repairman','statusCheck', 'method','remark','pro_return' ไม่ได้ถูกส่ง

    public function typeCheck()
    {  
    return $this->belongsTo(pro_type::class,'device_id'); // ตัวแปร เทียบกับ typeProduct
    }
    
    public function statusCheckname()
    { 
    return $this->belongsTo(statusCheck::class,'status_id');
    }

    public function users()
    { 
    return $this->belongsTo(User::class,'idM'); //('App\User','idM','id');
    }

    public function repairname()
    { 
    return $this->belongsTo(User::class,'repairman'); //('App\User','idM','id');
    }

   protected $primaryKey="id";   // php มอง id เป็น int 
   public $incrementing =false;

protected $dates = ['date_begin', 'date_end'];
}