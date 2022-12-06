<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';
    protected $primaryKey='uid';
    protected $fillable=['name','email','Password','user_status','user_type'];
}
