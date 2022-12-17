<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\course_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseDetailsController extends Controller
{
    /*-----------------------------------------Display a listing of the resource.                         */
        public function index()
        {
            $data['course_details']=course_details::all();
            return view('admin.insert.dashboard',$data);
        }
    
    /* -----------------------------------------Show the form for creating a new resource.                          */
        public function create()
        {       
            //  $data['categories'] = course_details::where('parent_id',0)->get();
            $data['course'] = Course::all();
            $data = course_details::all();
            foreach($data as $cou){
                $new_data[]=array(
                    'id'=>$cou->id,
                    'title'=>$cou->title,
                    'parent_id'=>$cou->parent_id,
                    'course_id'=>$cou->course_id,
                );
            }
            return response()->json([
                'return' => $new_data,
            ],200);
            return view('unsert_course');
        }
        

    
    /* -----------------------------------------Display the specified resource.                                                  */
        public function store(Request $request){
            $validator=Validator::make($request->all(),[
                'title'=>'required',
                'parent_id'=>'required',
                'course_id'=>'required',
            ],[
                'title.required'=>':attribute',
                'parent_id.require'=>':attribute',
                'course_id.require'=>':attribute',
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
               
                    $data = new course_details;
                    $data->title= $request->title;
                    $data->parent_id=$request->parent_id;
                    $data->course_id= $request->course_id;
                    
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
        public function edit(course_details $course_details)
        {
            //
        }
    
    /* -----------------------------------------Update the specified resource in storage.                                    */
        public function update(Request $request, course_details $course_details)
        {
            //
        }
    
    /* -----------------------------------------Remove the specified resource from storage.                                     */
        public function destroy(course_details $course_details)
        {
            $user['data']=$course_details;
            $course_details->delete();
            return response()->json([$user,'massage'=>'Data is deleted successfuly']);
        }
    /*-------------------------------------------------------------form ui            */
        public function create2(){
            $data['courses']=Course::all();
            $data['course_details'] = course_details::all();
            return view("admin.insert_course_item",$data);
        }
        public function store2(Request $req){
            if($req->method()=='Post'){
                $data=$req->validate([
                    'title'=>'required',
                    'course_id'=>'required',
                ]);
                $data=new course_details();
                $data->title=$req->title;
                $data->parent_id=$req->parent_id;
                $data->course_id=$req->course_id;
                $data->save();
                return redirect()->back();
            }
        }
    }