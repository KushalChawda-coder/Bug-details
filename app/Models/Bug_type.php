<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bug_type extends Model
{
    protected $table='bug_type';
    protected $primaryKey='bug_type_id';
    protected $fillable=['bug_category_name'];
}
