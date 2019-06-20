<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='users';
    protected $fillable = [
       'id', 'name','department_id', 'email','username', 'password' ,'deleted','img'
    ];
    public function userCheck()
    {   
        return $this->belongsTo(roleCheck::class,'role_id');   
        
    }
    public function data(){   
        return $this->hasmany(data_repair::class,'id');   //('App\Data','id')
        //เรียก modal data :: class ให้ id ของ users = idM
    }
    public function departCheck()
    {   
        return $this->belongsTo(depart_id::class,'department_id');   
        
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey="id";   // php มอง id เป็น int 
    public $incrementing =false;

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
