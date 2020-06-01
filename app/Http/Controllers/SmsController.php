<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function sms()
    {
    	return view('doctor.sms.index');
    }

    public function send_sms(Request $requset)
    {
$to = $requset->number;
$token = "6820abc030fca9eb59e24ec6e019f2c4";
$message = $requset->messege;

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
 return redirect()->back()->with('msg',$smsresult);
    }
}
