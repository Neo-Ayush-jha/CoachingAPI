<?php

namespace App\Http\Controllers;
use App\Models\Test;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function index($name){
        if($name != 'null'){
            $new = $name.' Good Evening';
            return response()->json([
                'result' => $new
            ],200);
        }
        else{
            return response()->json("Data not found",202);

        }
    }
    public function create(Request $req){
        $validator = Validator::make($req->all(), [
            'name'     => 'required',
            'age'=> 'required',
            'email'     => 'required|email|unique:tests',
            'password' => 'required',
        ],[
            'name.required' => ':attribute',
            'age.required' => ':attribute',
            'email.required' => ':attribute',
            'password.required' => ':attribute',
        ]);
         
        if ($validator->fails()) {
            $errors = json_decode($validator->errors());
            $fiedls = [];
            foreach($errors as $error){
                $fiedls[] = $error[0];
            };
            $errorFiedls = implode(", ",$fiedls);
            $errorMessage = [
                'error'=>'This fields are required: '.$errorFiedls,
            ];
            return response()->json($errorMessage, 422);
        }


        try {
            if($req->hasFile('img')){
                $file= $req->file('img');
                $coverName = rand().'_'.time().'_'.$file->getClientOriginalName();
                $file->move(\public_path("img/"),$coverName);
                $data = new Test;
                $data->name = $req->name;
                $data->age = $req->age;
                $data->email = $req->email;
                $data->password = $req->password;
                $data->img=$coverName;
            }
       $result = $data->save();
       if($result){
        return response()->json([
            'result'=>$data,
            'message'=>'Data is  save'
        ],200);
       }
       else{
        return response()->json([
            'result'=>$req,
            'message'=>'Data is not not save'
        ],201);
       }
       } catch (\Throwable $th) {
        return response()->json([
            'result'=>$th,
            'message'=>'Data is not not save'
        ],201);
    
       } 
    }
    public function show(){
        $data=Test::all();
        foreach($data as $user){
            $new_data[] = array(
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'age' => $user->age,
                'img' => env('WS_URL').'/img/'.$user->img,
            );

        }
        return response()->json([
            'result' => $new_data,
        ],200);
    }
}
