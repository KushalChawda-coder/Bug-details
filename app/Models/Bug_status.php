<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bug_status extends Model
{
    protected $table='bug_status';
    protected $primaryKey='bug_status_id';
    protected $fillable=['bug_status_name '];
}
