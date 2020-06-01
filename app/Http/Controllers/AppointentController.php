<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Appointment;
use App\Doctor;
use App\Old_apoint;
use Session;


class AppointentController extends Controller
{
   public function index()
   {
     $id =Session::get('doctor_id');

   	$app =Appointment::where('doctor_id',$id)->where('ap_status','sending')->orderBy('id','desc')->get();
    $old =Old_apoint::where('doctor_id',$id)->where('ap_status','sending')->orderBy('id','desc')->get();
   	return view('doctor.appointment.index',compact('app','old'));
   }

   public function taking()
   {

     $id =Session::get('doctor_id');
    $app =Appointment::where('doctor_id',$id)->where('ap_status','receive')->orderBy('id','desc')->get();
    $old =Old_apoint::where('doctor_id',$id)->where('ap_status','receive')->orderBy('id','desc')->get();
    return view('doctor.appointment.taking',compact('app','old'));
   }

   public function new_appoint()
   {
   	return view('doctor.appointment.new_appoint');
   }

   public function exit(Request $request)
   {
   	$ap_date =$request->ap_date;
   	 $doctor_id =$request->doctor_id;
   	$nameOfDay = date('D', strtotime($ap_date));
    $sd =DB::table('scheduales')->where('doctor_id',$doctor_id)->where('se_day',$nameOfDay)->where('status','active')->first();
    if ($sd) {
    return $sd->se_day;
    	
    }
    
   }

   public function exitfee(Request $request)
   {
   	 $ap_date =$request->ap_date;
     $doctor_id =$request->doctor_id;
     $fee =Doctor::find($doctor_id);
     if ($fee) {
     	return $fee->fee;

     }

   }

   public function exitnum(Request $request)
   {
     $ap_date =$request->ap_date;
     $doctor_id =$request->doctor_id;
     $ap=Appointment::where('doctor_id',$doctor_id)->where('ap_date',$ap_date)->count();
     $se =DB::table('perday_patients')->where('doc_id',$doctor_id)->where('date',$ap_date)->where('status','active')->sum('total');
     if ($se ) {
    if ($se>$ap) {
       $total =$se-$ap;
       $res ='<div style="background: #5A9599;color: #fff;font-size:19px"><span>This Day Doctor Sceduale:'.$se.'</span>';
       $res.='<p>Total Booking '.$ap.'</p>';
       $res.='<p>Free Booking '.$total.'</p></div>';
       return $res;
    }

     }
   }

public function new_print()
{
  return view('doctor.appointment.newprint');
}
   public function newapstore(Request $request)
   {
        $this->validate($request, [
           'pat_f_name' =>'required',
           'ap_mobile' =>'required',
           'ap_date' =>'required',
           'problem' =>'required',
           'ap_address' =>'required',
           'doc_fee' =>'required',
        



       ]);
    
    $appointed_by =Session::get('doctor_email');
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
    $apoint->ap_email=$request->ap_email;
    $apoint->ap_mobile=$request->ap_mobile;
    $apoint->ap_date=$request->ap_date;
    $apoint->ap_address=$request->ap_address;
    $apoint->ap_type='new';
    $apoint->serial_no=$i;
    $apoint->appointed_by=$appointed_by;
    $apoint->payment_status='paid';
    $apoint->ap_status='sending';
    $apoint->problem=$request->problem;
    $apoint->gender=$request->gender;
    $apoint->age=$request->age;

    $apoint->save();
    $last_id =$apoint->id;
    return redirect()->route('admin.appointment.newprint',compact('last_id'))->with('msg','print copy is ready');





   }

   public function neapprint(Request $request)
   {
    $ap_id=$request->ap_id;
    $new =Appointment::find($ap_id);
     return response()->json($new);

   }
   //old
   public function old_appoint()
   {
    return view('doctor.appointment.old_appoint');
   }

   public function oldinfo(Request $request)
   {
   $pat_id=$request->pat_id;
   $olds=Appointment::where('pa_id',$pat_id)->first();
   if ($olds) {
   return response()->json($olds);
   }

   }

   public function oldexitfee(Request $request)

   {
     $doctor_id=$request->doctor_id;
     $ap_date=$request->ap_date;
     $pap_date=$request->pap_date;

     $starttm = strtotime($ap_date);
    $endtm = strtotime($pap_date);
    $days_between = ceil(abs($endtm - $starttm) / 86400);
    $fee =Doctor::where('id',$doctor_id)->where('servicing','>=',$days_between)->first();
    if ($fee) {
     
    return $fee->old_fee;
    }

   }

   public function oldapstore(Request $request)
   {
       $this->validate($request, [
           'pat_f_name' =>'required',
           'ap_mobile' =>'required',
           'ap_date' =>'required',
           'problem' =>'required',
           'ap_address' =>'required',
           'doc_fee' =>'required',
        



    ]);
    $appointed_by =Session::get('doctor_email');
    $row =Appointment::where('doctor_id',$request->doctor_id)->where('ap_date',$request->ap_date)->count();
    if ($row>0) {
       $i =$row+1;
    }
    else{
       $i =1;
    }
    $apoint= new Old_apoint();
    $apoint->pa_id=$request->pa_id;
    $apoint->pat_f_name=$request->pat_f_name;
    $apoint->doctor_id=$request->doctor_id;
    $apoint->doc_fee=$request->doc_fee;
    $apoint->ap_email=$request->ap_email;
    $apoint->ap_mobile=$request->ap_mobile;
    $apoint->ap_date=$request->ap_date;
    $apoint->ap_address=$request->ap_address;
    $apoint->ap_type='old';
    $apoint->serial_no=$i;
    $apoint->appointed_by=$appointed_by;
    $apoint->payment_status='paid';
    $apoint->ap_status='sending';
    $apoint->problem=$request->problem;
    $apoint->gender=$request->gender;
    $apoint->age=$request->age;
    $apoint->save();
    $oldlast_id =$apoint->id;
    return redirect()->route('admin.appointment.newprint',compact('oldlast_id'))->with('msg','print copy is ready');


   }

   public function oldprint(Request $request)
   {
       $oap_id=$request->oap_id;
    $old =Old_apoint::find($oap_id);
     return response()->json($old);
   }

   public function online()
   {
    $id =Session::get('doctor_id');
     $app =Appointment::where('doctor_id',$id)->where('ap_type','online')->where('ap_status','!=','receive')->orderBy('id','desc')->get();
      $app1 =Appointment::where('doctor_id',$id)->where('ap_type','online')->where('ap_status','receive')->orderBy('id','desc')->get();
    return view('doctor.appointment.online',compact('app','app1'));
   }
}
