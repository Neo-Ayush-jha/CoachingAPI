<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_details extends Model
{
    use HasFactory;
    public function parent(){
        return $this->hasOne(course_details::class,'id',"parent_id");
    }
}
