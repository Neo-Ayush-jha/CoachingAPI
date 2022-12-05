<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use App\Models\course_details;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $data['courses']=Course::all();
        $data['course_details']=course_details::all();
        return view("homepages/home",$data);
        // return view("homepages/home");
    }
    public function courses(){
        $data['courses']=Course::all();
        $data['course_details'] = course_details::where('parent_id',0)->get();
        // $data['course_details']=course_details::all();
        return view("homepages/courses" , $data);   
    }
   

    public function create()
    {
        //
    }

    public function apply(Request $req){
        // dd($request->image); die;
        if($req->method() == "POST"){
            $data=$req->validate([
                'dob'=>'required',
                'name'=>'required',
                'email'=>'required',
                'gender'=>'required',
                'address'=>'required',
                'contact'=>'required',
                'password'=>'required',
            ]);
            $data=new User();
            $data->dob=$req->dob;
            $data->name= $req->name;
            $data->email=$req->email;
            $data->gender=$req->gender;
            $data->address=$req->address;
            $data->contact=$req->contact;
            $data->password=$req->password;
            // $data->user_type=$req->user_type;
            $data->save();
            User::create($data);
            return redirect()->route("homepage");
        }
        return view("homepages/apply");
            // User::create($data);
            // return redirect()->route("apply");
        
        // return view("homepages/apply");
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
