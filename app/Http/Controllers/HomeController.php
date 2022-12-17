<?php

namespace App\Http\Controllers;
use Session;
use Carbon\Carbon;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,Course,Order,Payment,course_details,OrderItem,Paymentt};

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

//-----------------------------------------------Payment Method--------------------------------->
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

    public function paymentCallback(Request $request)
    { 
        $input = $request->all();
        $razorpayKey = "rzp_test_JcTEYdlpexwZV0";
        $razorpaySecret = "OMZbzgbIRevKm8e9qZv0tihQ";
        $api = new Api($razorpayKey, $razorpaySecret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment->amount )); 
// ---------------------------------------------------data add in database---------------------- 
                if($payment){
                    //Transaction Successful
                    $data=Course::find($id);
                    // dd($get_course);
                    $pay=Paymentt::where([['status',false],['course_id',$data->id],["user_id",Auth::id()]])->first();
                    // $pay = Paymentt::where("course_id",get_course()->id)->first();
                    $pay->txn_id = $response['id'];
                    $pay->bank_name = $response['wallet'];
                    $pay->mode = $response["method"];
                    $pay->dateofpayment = $response["14/12/2022"];
                    $pay->status = 1;
                    $pay->save();
                }
// ---------------------------------------------------data add in database---------------------- 
                dd($response);
                //   return redirect()->back();
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }          
        Session::put('success', 'Payment successful');

        
        return redirect()->back();
    }


//------------------------------------------------ add course----------------------------------> 
    public function addCourse2(Request $req,$id){
        $data=Course::find($id);
        $user = Auth::user();
        // dd($user);
        // $course = $req->course_id;
        // $user = $req->user_id;
        $sc = new Order();
        $sc->course_id = $data->id;
        $sc->user_id = $user->id;
        // dd($sc);
        $sc->save();
        return redirect()->route("homepage");
            // return redirect()->back();
    }
}