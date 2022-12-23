<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    protected $table='bug';
    protected $primaryKey='id';
    protected $fillable=['bug_title','bug_image','bug_description','bug_url','bug_category',
                            'assigned_to','bug_status','comment'];


     public function user(){
        return $this->hasMany(User::class,'uid','assigned_to');
    } 

     public function bug_status_data(){
        return $this->hasMany(Bug_status::class,'bug_status_id','bug_status');
    } 

    public function Bug_type_data(){
        return $this->hasMany(Bug_type::class,'bug_type_id','bug_category');
    } 
    
}
