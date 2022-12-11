<?php

namespace App\Http\Controllers;
// use Razorpay;
use Razorpay\Api\Api;
use Session;
use App\Models\User;
use App\Models\Payment;
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
        $data['course_details'] = course_details::all();
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

    public function indexStudent(){
        $data['students'] = User::where("status","1")->get();
        $data['title']="Active";
        return view("admin/manageStudents",$data);
    }

    public function newAdmission(){
        $data['students']=User::where("status","0")->get();
        $data['title']="New Admission";
        return view("admin/manageStudents",$data);
    }
    public function passOut(){
        $data['students']=User::where("status","2")->get();
        $data['title']="Pass Out";
        return view("admin/manageStudents",$data);
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

//-----------------------------------------------Payment Method


public function index2()
{    
    $data['courses']=Courses::all();
    return view('homepages/onlinePayment',$data);
}

public function onlinePayment(Request $req){
    $contact=$req->contact;
    if($req->has('contact')):
        $payment['userDetail'] = User::where("contact",$contact)->with('course')->first();
        return view("homepages/onlinePayment",$payment);
    else:
        return view("homepages/onlinePayment");
    endif;
}


    public function makepayment(Request $req)
    {
        $contact = $req->contact;
        // dd($contact);
        $std = User::where("contact",$contact)->with('course')->first();
        $pay = Payment::find($req->pay_id);
        $payment = Api::with('receive');
        $payment->prepare([
          'user' => $std->id,
          'contact' => $std->contact,
          'email' => $std->email,
          'fee' => $pay->fee,
          'callback_url' => "http://localhost:8000/online-payment/call-back"
        ]);
        return $payment->receive();
    }  


    
    // private $razorpayId = "rzp_test_ISOwomsQzcDDQt";
    // private $razorpayKey = "53hKzsqH5MyVyXclZmscoHKP";

    public function store2(Request $request)
    { 
        $input = $request->all();
        $api = new Api("rzp_test_ISOwomsQzcDDQt", "53hKzsqH5MyVyXclZmscoHKP");
        dd($api);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment->amount )); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }

}