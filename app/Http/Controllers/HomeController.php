<?php

namespace App\Http\Controllers;
use Session;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,Course,orders,Payment,course_details,OrderItem};

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
                dd($response);
  
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
// public function addCourse(Request $req,$c_id){
//     $user = Auth::user();
//     $subject=Course::find($c_id);
//     if($user){
//         $order=OrderItem::where([['ordered',false],["user_id",Auth::id()]])->first();
//         if($order){
//             $orderItem=Order::where([['ordered',false],['course_id',$order->id],['user_id',$user->id]])->first();
//             // $orderItem=get_order();
//             if($orderItem){
//                 $orderItem->qty +=1;
//                 $orderItem->save();
//             }
//             else{
//                 $oi=new Order();
//                 $oi->ordered=false;
//                 $oi->course_id=$order->id;
//                 $oi->user_id=$user->id;
//                 $oi->save();
//             }
//         }
//         else{
//             $ord=new OrderItem();
//             $ord->ordered=false;
//             $ord->user_id=$user->id;
//             $ord->save();

//             $oi=new Order();
//             $oi->ordered=false; 
//             $oi->user_id=$user->id;
//             $oi->course_id=$ord->id;
//             $oi->save();
//         }
//         return redirect()->route("homepage");
//     }
// }
}