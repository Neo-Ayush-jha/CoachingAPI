<?php

namespace App\Http\Controllers;

use App\Models\{Course,course_details,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
/*-----------------------------------------Display a listing of the resource.                         */
    public function index()
    {
        $data['course']=Course::all();
        return view('admin.manage_course',$data);
    }

/* -----------------------------------------Show the form for creating a new resource.                          */
    public function create()
    {
        $data = Course::all();
        foreach($data as $cou){
            $new_data[]=array(
                'id'=>$cou->id,
                'fee'=>$cou->fee,
                'state'=>$cou->state,
                'title'=>$cou->title,
                'duration'=>$cou->duration,
                'instructor'=>$cou->instructor,
                'description'=>$cou->description,
                'discount_fee'=>$cou->discount_fee,
                'cover' => env('WS_URL').'/cover/'.$cou->cover,
            );
        }
        return response()->json([
            'return' => $new_data,
        ],200);
        return view('admin.insert_course');
    }

    public function create2(){
        return view("admin.insert_course"); 
     }

/* -----------------------------------------Display the specified resource.                                                  */
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'fee'=>'required',
            'title'=>'required',
            'duration'=>'required',
            'instructor'=>'required',
            'description'=>'required',
        ],[
            'fee.require'=>':attribute',
            'title.required'=>':attribute',
            'duration.require'=>':attribute',
            'instructor.require'=>':attribute',
            'description.require'=>':attribute',
        ]);
        if($validator->fails()){
            $error=json_decode($validator->error());
            $fiedls=[];
            foreach($error as $error){
                $fiedls[]=$error[0];
            };
            $errorFiedls=import(", ",$fiedls);
            $errorMassage=[
                'error'=>'This fields are require :'.$errorFiedls,
            ];
            return response()->json($errorMassage,422);
        }
        try{
            if($request->hasFile('cover')){
                $file=$request->file('cover');
                $coverName = rand().'_'.time().'_'.$file->getClientOriginalName();
                $file->move(\public_path('cover/'),$coverName);

                $data = new Course;
                $data->cover=$coverName;
                $data->fee=$request->fee;
                $data->title= $request->title;
                $data->duration=$request->duration;
                $data->duration= $request->duration;
                $data->instructor= $request->instructor;
                $data->description= $request->description;
                $data->discount_fee= $request->discount_fee;
            }
            $result = $data->save();
            if($result){
                return response()->json([
                    'result'=>$data,
                    'massage'=>'Data is save by you ayush'
                ],200);
            }
            else{
                return response()->json([
                    'return'=>data,
                    "massage"=>'Oooo... Data is not save by you ayush'
                ],201);
                return view("admin.insert_course");
            }
        }catch(\Throwable $th){
            return response()->json([
                'result'=>$th,
                'massage'=>'Data is not save by you ayush'
            ],201);
        }
        return redirect()->router('index')->with('success','WoW!  data is inserted by you ayush successfully');
    }

/* -----------------------------------------Show the form for editing the specified resource.                                   */
    public function edit(Course $course)
    {
        //
    }

/* -----------------------------------------Update the specified resource in storage.                                    */
    public function update(Request $request, Course $course)
    {
        //
    }

/* -----------------------------------------Remove the specified resource from storage.                                     */
    public function destroy(Course $course)
    {
        $user['data']=$course;
        $course->delete();
        return response()->json([$user,'massage'=>'Data is deleted successfuly']);
    }

    public function addCourse($id){
        $data['courses']=Course::find($id);
        $std['user']=User::find($id);
        // dd($std);
        $data['courseDetails']=course_details::all();

        return view("homepages/singleCourse",$data);
    }
}
