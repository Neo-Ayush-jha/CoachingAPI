<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class course_details extends Model
{
    use HasFactory;
   
    public function course_details(){
        // return $this->hasMany(course_details::class,'id',"parent_id");
        return $this->hasMany(course_details::class,'id',"parent_id");
    }
    public function course(){
        return $this->hasOne(Course::class,'id',"course_id");
    }
}
