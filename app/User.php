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
       'id', 'name','department', 'email','username', 'password' ,'deleted','img'
    ];
    public function adminChecktest()
    {   
        return $this->belongsTo(roleCheck::class,'roleCheck');   
        //เรียก rolecheck class จาก roleCheck.php
    }
    public function data(){   
        return $this->hasmany(data::class,'id');   //('App\Data','id')
        //เรียก modal data :: class ให้ id ของ users = idM
    }
    public function departCheck()
    {   
        return $this->belongsTo(depart_id::class,'department');   
        
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
