<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $table='bug';
    protected $primaryKey='id';
    protected $fillable=['bug_title','bug_image','bug_description','bug_url','bug_category',
                            'assigned_to','bug_status','comment'];
}
