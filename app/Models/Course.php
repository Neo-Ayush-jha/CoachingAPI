<?php

namespace App\Models;
use App\Models\course_details;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function course_details(){
        return $this->hasMany(course_details::class,'id',"parent_id");
    }
    
}
 