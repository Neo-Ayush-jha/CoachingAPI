<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Paymentt;
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

        $data['user'] = User::all()->count();
        $data['countCourde'] = Course::all()->count();
        $data['due_payment']=Paymentt::where("payment_status","1")->get();
        return view("admin/dashboard",$data);
    }
    public function payment(){

        $data['user'] = User::all()->count();
        $data['countCourde'] = Course::all()->count();
        $data['due_payment']=Paymentt::where("payment_status","1")->get();
        return view("admin/managePayment",$data);
    }
    static  public function makeCashPayment($std_id,$id){
        
        $std = User::find($std_id);
        if($std){
            $payment = Payment::where([["user_id",$std->id],["id",$id]])->first();
            $payment->status="1";
            $payment->save();
        }
        return redirect()->route("admin.dashboard");
    }
}
