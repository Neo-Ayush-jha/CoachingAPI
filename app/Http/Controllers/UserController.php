<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{

/*-----------------------------------------Display a listing of the resource.                         */
    public function index()
    {
        $data['user']=User::all();
        return view("user.dashboard",$data);
    }

/* -----------------------------------------Show the form for creating a new resource.                          */
   
    public function create()
    {
        $data=User::all();
        foreach($data as $use){
            $new_data[]=array(
                'id'=>$use->id,
                'dob'=>$use->dob,
                'name'=>$use->name,
                'email'=>$use->email,
                'gender'=>$use->gender,
                'contact'=>$use->contact,
                'address'=>$use->address,
                'password'=>$use->password,
            );
        }
        return response()->json([
            'return' => $new_data,
        ],200);
        return view('insert_user');
    }

/* -----------------------------------------Display the specified resource.                                                  */
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'dob'=>'required',
            'name'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'password'=>'required',
        ],[
            'dob.require'=>':attribute',
            'name.require'=>':attribute',
            'email.require'=>':attribute',
            'gender.require'=>':attribute',
            'contact.require'=>':attribute',
            'address.require'=>':attribute',
            'password.require'=>':attribute',
        ]);
        if($validator->fails()){
            $error=json_decode($validator->error());
            $fiedls=[];
            foreach($error as $error){
                $fiedls[]=$error[0];
            };
            $errorFiedls=import(",",$fiedls);
            $errorMassage=[
                'error'=>'This fields are require :'.$errorFiedls,
            ];
            return response()->json($errorMassage,422);
        }
        try{
            $data=new User();
            $data->dob=$request->dob;
            $data->name= $request->name;
            $data->email=$request->email;
            $data->gender=$request->gender;
            $data->address=$request->address;
            $data->contact=$request->contact;
            $data->password=$request->password;
            // $data->user_type=$request->user_type;
            $result = $data->save();
            if($result){
                return response()->json([
                    'result'=>$data,
                    'massage'=>'Hyyy... data is save by you Ayush'
                ],200);
            }
            else{
                return response()->json([
                    'return'=>data,
                    'massage'=>'Oooo.. data is not save by you ayush',
                ],201);
            }
        }catch(\Throwable $th){
            return response()->json([
                'result'=>$th,
                'massage'=>'Nnooo.. data is not save by you ayush',
            ],201);
        }
        return redirect()->json('index')->with("Success","WOW!! data is inserted by you ayush successfully");
    }

    
/* -----------------------------------------Show the form for editing the specified resource.                                   */
    public function edit($id)
    {
        //
    }

/* -----------------------------------------Update the specified resource in storage.                                    */

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'dob'=>'required',
            'name'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'password'=>'required',
        ],[
            'dob.require'=>':attribute',
            'name.require'=>':attribute',
            'email.require'=>':attribute',
            'gender.require'=>':attribute',
            'contact.require'=>':attribute',
            'address.require'=>':attribute',
            'password.require'=>':attribute',
        ]);
        if($validator->fails()){
            $error=json_decode($validator->error());
            $fiedls=[];
            foreach($error as $error){
                $fiedls[]=$error[0];
            };
            $errorFiedls=import(",",$fiedls);
            $errorMassage=[
                'error'=>'This fields are require :'.$errorFiedls,
            ];
            return response()->json($errorMassage,422);
        }
        try{
            $data->dob=$request->dob;
            $data->name= $request->name;
            $data->email=$request->email;
            $data->gender=$request->gender;
            $data->address=$request->address;
            $data->contact=$request->contact;
            $data->password=$request->password;
            $data->user_type=$request->user_type;
            $result = $data->save();
            if($result){
                return response()->json([
                    'result'=>$data,
                    'massage'=>'Hyyy... data is save by you Ayush'
                ],200);
            }
            else{
                return response()->json([
                    'return'=>data,
                    'massage'=>'Oooo.. data is not save by you ayush',
                ],201);
            }
        }catch(\Throwable $th){
            return response()->json([
                'result'=>$th,
                'massage'=>'Nnooo.. data is not save by you ayush',
            ],201);
        }
        return redirect()->json('index')->with("Success","WOW!! data is inserted by you ayush successfully");
    }

/* -----------------------------------------Remove the specified resource from storage.                                     */
    public function destroy(User $id)
    {
        $user['data']=$id;
        $id->delete();
        return response()->json([$user,'massage'=>'Data is deleted successfuly']);
    }
}
