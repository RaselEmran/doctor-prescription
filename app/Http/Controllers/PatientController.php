<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Patient;
use App\Appointment;
use Validator;
use Session;

class PatientController extends Controller
{
   public function index()
   {
   	$patient =Patient::all();
   	return view('doctor.patient.index',compact('patient'));
   }

   public function store(Request $request)
   {

   		$validator = Validator::make($request->all(), [
           'patient_name' =>'required',
           'phone' =>'required',
           'address' =>'required',
           'sex' =>'required',
           'date_birth' =>'required',
           'address' =>'required',
        ]);

      if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	$count =Patient::count();
        	if ($count>0) {
        		$patid ='100'.$count;
        	}
        	else
        	{
        		$patid ='100';
        	}
        	
        	$patient =new Patient();
        	$patient->doctor_id =$request->doctor_id;
        	$patient->doctor_name =$request->doctor_name;
        	$patient->patient_name =$request->patient_name;
        	$patient->pat_id =$patid;

        	$patient->email =$request->email;
        	$patient->phone =$request->phone;
        	$patient->address =$request->address;
        	$patient->sex =$request->sex;
        	$patient->date_birth =$request->date_birth;
        	$patient->blood =$request->blood;
        	$patient->problem =$request->problem;
        	$patient->save();
            return response()->json(['success'=>'Record is successfully added']);

        }

   }

   public function edit(Request $request)
   {
   	$id =$request->patient_id;
   	$patient=Patient::find($id);
   	return response()->json($patient);
   } 

   public function update(Request $request)
   {
   	 $validator = Validator::make($request->all(), [
           'patient_name' =>'required',
           'phone' =>'required',
           'address' =>'required',
           'sex' =>'required',
           'date_birth' =>'required',
           'address' =>'required',
        ]);

      if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	$id =$request->id;
        	$patient =Patient::find($id);
        	$patient->patient_name =$request->patient_name;
        	$patient->email =$request->email;
        	$patient->phone =$request->phone;
        	$patient->address =$request->address;
        	$patient->sex =$request->sex;
        	$patient->date_birth =$request->date_birth;
        	$patient->blood =$request->blood;
        	$patient->problem =$request->problem;
        	$patient->save();
            return response()->json(['success'=>'Record  successfully Update']);

        }

   }

   public function patient_apoint()
   {
   	$apointment =Appointment::where('ap_type','indor')->where('ap_status','sending')->get();
   	return view('doctor.patient.patient_apoint',compact('apointment'));
   }

   public function pat_info(Request $request)
   {
    $pat_id=$request->pat_id;
    $patient =Patient::where('pat_id',$pat_id)->first();
    if ($patient) {
    	return response()->json($patient);
    }
   }

   public function patientapoint(Request $request)
   {
   	 $this->validate($request, [
           'pat_f_name' =>'required',
           'ap_mobile' =>'required',
           'ap_date' =>'required',
           'problem' =>'required',
           'ap_address' =>'required',
           'doc_fee' =>'required',
        



       ]);

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
 $appointed_by =Session::get('doctor_email');
    $apoint= new Appointment();
    $apoint->pa_id=$pat_id;
    $apoint->pat_f_name=$request->pat_f_name;
    $apoint->doctor_id=$request->doctor_id;
    $apoint->doc_fee=$request->doc_fee;
    $apoint->ap_email=$request->ap_email;
    $apoint->ap_mobile=$request->ap_mobile;
    $apoint->ap_date=$request->ap_date;
    $apoint->ap_address=$request->ap_address;
    $apoint->ap_type='indor';
    $apoint->serial_no=$i;
    $apoint->appointed_by=$appointed_by;
    $apoint->payment_status='paid';
    $apoint->ap_status='sending';
    $apoint->problem=$request->problem;
    $apoint->save();
    $last_id =$apoint->id;
    return redirect()->route('admin.appointment.newprint',compact('last_id'))->with('msg','print copy is ready');
   }

   public function taking_apoint()
   {

     $id =Session::get('doctor_id');
    $app =Appointment::where('doctor_id',$id)->where('ap_type','indor')->where('ap_status','receive')->orderBy('id','desc')->get();

    return view('doctor.patient.taking_apoint',compact('app'));
   }
}
