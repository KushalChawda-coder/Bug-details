<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='users';
    protected $primaryKey='uid';
    protected $fillable=['name','email','password','user_status','user_type'];

//,Bug_type::class,Bug_status::class
   
    
   
}
