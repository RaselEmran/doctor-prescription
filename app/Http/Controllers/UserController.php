<?php

namespace App\Http\Controllers;
use DB;
use App\Appointment;
use App\Doctor;
use App\Old_apoint;
use Session;
use App\Patient;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showdashbord()
    {
    	return view('subadmin.main');
    }

     public function index()
   {

   	$app =Appointment::where('ap_status','sending')->orderBy('id','desc')->get();
    $old =Old_apoint::where('ap_status','sending')->orderBy('id','desc')->get();
   	return view('subadmin.appointment.index',compact('app','old'));
   }

     public function neapprint(Request $request)
   {
    $ap_id=$request->ap_id;
    $new =Appointment::find($ap_id);
     return response()->json($new);

   }

      public function oldprint(Request $request)
   {
       $oap_id=$request->oap_id;
    $old =Old_apoint::find($oap_id);
     return response()->json($old);
   }

     public function new_appoint()
   {
   	return view('subadmin.appointment.new_appoint');
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
     $se =DB::table('perday_patients')->where('doc_id',$doctor_id)->where('date',$ap_date)->sum('total');
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
   	  	   'doctor_id'=>'required',
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
    $apoint->save();
    $last_id =$apoint->id;
    return redirect()->route('user.appointment.newprint',compact('last_id'))->with('msg','print copy is ready');


   }

      //old
   public function old_appoint()
   {
    return view('subadmin.appointment.old_appoint');
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
    $apoint->save();
    $oldlast_id =$apoint->id;
    return redirect()->route('admin.appointment.newprint',compact('oldlast_id'))->with('msg','print copy is ready');


   }

   //patient....
    public function pat_index()
   {
   	$patient =Patient::all();
   	return view('subadmin.patient.index',compact('patient'));
   }
  
     public function pat_store(Request $request)
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

      public function pat_edit(Request $request)
   {
   	$id =$request->patient_id;
   	$patient=Patient::find($id);
   	return response()->json($patient);
   } 


      public function pat_update(Request $request)
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
   	return view('subadmin.patient.patient_apoint',compact('apointment'));
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


    public function change()
    {
         $id =Session::get('doctor_id');
        $admin=Doctor::find($id);
        return view('subadmin.setting.change',compact('admin'));
    }

    public function pass(Request $request)
    {
       $old =$request->old;
       $oldpass =md5($old);
       $email =$request->email;
       $pass =DB::table('doctors')->where('email',$email)->where('password',$oldpass)->first();
       if ($pass) {
     
       return '<span style="color:green">'.$old.' Password is Correct</spam>';
       }
       else
       {
         return '<span style="color:red">'.$old.' Password is incorrect</spam>';
       }
    }

    public function pass_change(Request $request,$id)
    {
          $this->validate($request, [
           'new' =>'required',

       ]);
        $email=$request->email;
        $old=$request->old;
        $oldpass =md5($old);
        $new=MD5($request->new);
        $pass =DB::table('doctors')->where('email',$email)->where('password',$oldpass)->update(['password'=>$new]);
       if ($pass) {
            return redirect()->back()->with('msg','Password Update Succesfully');
       }
       else
       {
        return redirect()->back()->with('emsg','Something Error');
       }
    }

public function online()
{
   $app =Appointment::where('ap_type','online')->where('ap_status','!=','receive')->orderBy('id','desc')->get();

   $app1 =Appointment::where('ap_type','online')->where('ap_status','receive')->orderBy('id','desc')->get();
    return view('subadmin.appointment.online',compact('app','app1'));

}

public function perseprint($id)
{
 $appointed_by =Session::get('doctor_email');

  $app =Appointment::find($id);
  $app->appointed_by =$appointed_by;
  $app->payment_status ='paid';
  $app->ap_status ='sending';
  $app->save();
  return view('subadmin.appointment.online_print',compact('id'));

}
    
}
