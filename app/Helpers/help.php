<?php
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

function get_course(){
    return $course=Course::where([['status',false],["user_id",Auth::id()]])->first();
}