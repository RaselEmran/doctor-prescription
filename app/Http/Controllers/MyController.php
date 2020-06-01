<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogpost;
use App\Tag;
use App\Posttag;
use App\Appointment;
use Validator;

class MyController extends Controller
{
    public function index()
    {
    	return view('fontend.mainpage');
    }

    public function blog()
    {
    	$post =Blogpost::where('status','active')->paginate(3);
    	return view('fontend.blog.index',compact('post'));
    }

    public function blog_details($id)
    {
    	$post =Blogpost::find($id);
    	return view('fontend.blog.details',compact('post'));
    }

    public function checkmobile(Request $request)
    {
        $ap_date =$request->ap_date;
        $ap_mobile =$request->ap_mobile;
        $app =Appointment::where('ap_mobile',$ap_mobile)->where('ap_date',$ap_date)->first();
         if ($app) {
            return response()->json(['error'=>'Today this Phone Number is already used']);
         }
         else
         {
           return response()->json(['success'=>'Today this Phone Number is not used yet']);
         }
  

    }

    public function apointment(Request $request)
    {

    $validator = Validator::make($request->all(), [
           'pat_f_name' =>'required',
           'ap_mobile' =>'required',
           'ap_address' =>'required',
           'state' =>'required',
           'ap_date' =>'required',
           'doc_fee' =>'required',
           'problem' =>'required',
           'gender' =>'required',
           'age' =>'required',



        ]);
       if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        else
        {
     $row =Appointment::where('doctor_id',$request->doctor_id)->where('ap_date',$request->ap_date)->count();
    if ($row>0) {
       $i =$row+1;
    }
    else{
       $i =1;
    }
      $count =Appointment::count();
      if ($count>0) {
        $pat_id ='100'.$count;
      }
      else
      {
        $pat_id ='100';
      }

    $apoint= new Appointment();
    $apoint->pa_id=$pat_id;
    $apoint->pat_f_name=$request->pat_f_name;
    $apoint->doctor_id=$request->doctor_id;
    $apoint->doc_fee=$request->doc_fee;
    $apoint->ap_mobile=$request->ap_mobile;
    $apoint->ap_date=$request->ap_date;
    $apoint->ap_address=$request->ap_address;
    $apoint->ap_type='online';
    $apoint->serial_no=$i;
    $apoint->payment_status='due';
    $apoint->ap_status='pending';
    $apoint->problem=$request->problem;
    $apoint->gender=$request->gender;
    $apoint->age=$request->age;

    $apoint->save();
    $last_id =$apoint->id;
    $sms =Appointment::find($last_id);
$mess ='dear '.$sms->pat_f_name.' your appointment create successfully your serial number '.$sms->serial_no.' appointment date '.$sms->ap_date;
    $to = $sms->ap_mobile;
$token = "6820abc030fca9eb59e24ec6e019f2c4";
$message = $mess;

$url = "http://api.greenweb.com.bd/api.php";


$data= array(
'to'=>"$to",
'message'=>"$message",
'token'=>"$token"
); // Add parameters in key value
$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
$smsresult = curl_exec($ch);
    
    return response()->json(['success'=>'your appointment create successfully please check your phone messege']);

        }

    }
}
