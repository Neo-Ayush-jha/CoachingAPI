<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class course_details extends Model
{
    use HasFactory;
   
    public function course_details(){
        return $this->belongsTo(self::class , 'parent_id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'id',"course_id");
    }
}
