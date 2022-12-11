<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Payment;
use App\Models\Course;
use App\Models\course_details;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function approveStudent($id){
        $std = User::find($id);
        $std->status = "1";
        $std->save();
        return redirect()->route("admin.manage.student.active");
    }
    public function deleteStudent($id){
        $std = User::find($id);
        $std->status = "2";
        $std->save();
        return redirect()->route("admin.manage.student.passout");
    }

    public function dashboard(){

        $data['countStudent'] = User::all()->count();
        $data['countCourde'] = Course::all()->count();
        $data['due_payment']=Payment::where("status","due")->get();
        return view("admin/dashboard",$data);
    }

}
