<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Doctor;
use App\Scheduale;
use App\Perday_patient;
use App\Appointment;

use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
{
   	 public function index()
    {
    $doctor_id =Session::get('doctor_id');
    $roll_id =Session::get('roll_id');
        if ($roll_id ==1) {
            return view('doctor.main');
        }
        else{
        return view('adminlogin');
    }
    }

     public function showdashbord()

    {
     return view('doctor.main');

    }


     public function login(Request $request)
    {
     $this->validate($request, [
           'email' =>'required',
           'password'=>'required',

       ]);
    	$email=$request->email;
    	$password=md5($request->password);
    	$result=DB::table('doctors')
    	    ->where('email',$email)
    	    ->where('password',$password)
    	    ->first();
    	    if ($result) {
    	        Session::put('doctor_name',$result->name);
                Session::put('doctor_id',$result->id);
                Session::put('roll_id',$result->roll_id);

                Session::put('doctor_email',$result->email);
          $id =$result->roll_id;
        if ($id ==1) {
           return redirect('/admin/dashboard')->with('succ','Login Successfully');
               }

           else
            {
           return Redirect::to('/user/dashboard')->with('succ','Login Successfully');
             }

                
    	    }
    	    else
    	    {
    	        Session::put('msg','Email and Password doesnt Match');
                return redirect('/admin');
    	    }
    }

        //profile.............
    public function profile()
    {
     $id =Session::get('doctor_id');
     $admin=Doctor::find($id);
     return view('doctor.setting.profile',compact('admin'));
     
    }

    public function profile_from(Request $request,$id)
    {
        $admin =Doctor::find($id);
        $admin->name =$request->username;
        $admin->email =$request->email;
        $admin->company =$request->company;
        $admin->contact =$request->contact;
        $admin->fee =$request->fee;
        $admin->servicing =$request->servicing;
        $admin->old_fee =$request->old_fee;


        $admin->save();
        return Redirect::to('admin/profile')->with('msg','Profile Update Successfully');

    }

    public function change()
    {
         $id =Session::get('doctor_id');
        $admin=Doctor::find($id);
        return view('doctor.setting.change',compact('admin'));
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

    //
    public function scheduale()
    {
      $id =Session::get('doctor_id');
      $alls =Scheduale::where('doctor_id',$id)->get();
      return view('doctor.setting.schedule',compact('alls'));  
    }

    public function sstore(Request $request)
    {
    $this->validate($request, [
           'se_day' =>'required',
           'strat_time' =>'required',
           'end_time' =>'required',
           'status' =>'required',


       ]);
     $sd =new Scheduale();
     $sd->doctor_id=$request->doctor_id;
     $sd->se_day=$request->se_day;   
     $sd->strat_time=$request->strat_time;   
     $sd->end_time=$request->end_time; 
     $sd->status=$request->status;
     $sd->save(); 
      return redirect()->back()->with('msg','Scheduale timetable Add Successfully');  


    }

    public function sedit(Request $request)
    {
        $sd_id =$request->sd_id;
       $sd =Scheduale::find($sd_id);
       return response()->json($sd);
    }

    public function supdate(Request $request)
    {
           $this->validate($request, [
           'se_day' =>'required',
           'strat_time' =>'required',
           'end_time' =>'required',
           'status' =>'required',


       ]);
        $id =$request->id;
        $sd= Scheduale::find($id);
        $sd->se_day=$request->se_day;   
        $sd->strat_time=$request->strat_time;   
        $sd->end_time=$request->end_time; 
        $sd->status=$request->status;
        $sd->save(); 
      return redirect()->back()->with('msg','Scheduale timetable Update Successfully');  

    }

    public function perday_patient()
    {
     $id =Session::get('doctor_id');

      $total =DB::table('perday_patients')->where('doc_id',$id)->get();
      return view('doctor.setting.perday_patient',compact('total','id'));
    }

    public function daystrore(request $request)
    {
      $this->validate($request, [
           'total' =>'required',
           'day' =>'required',
           'place' =>'required',
           'address' =>'required',
           'strat_time' =>'required',

           'date' =>'required|unique:perday_patients',


       ]);
      $nameOfDay = date('D', strtotime($request->date));
      $day =$request->day;
      if ($nameOfDay !==$day) {
        return redirect()->back()->with('emsg','Day And date Not match');
      }
      $data =array();
      $data['doc_id']=$request->doctor_id;
      $data['place']=$request->place;
      $data['address']=$request->address;
      $data['strat_time']=$request->strat_time;
      $data['end_time']=$request->end_time;

      $data['total']=$request->total;
      $data['day']=$request->day;
      $data['date']=$request->date;
      $data['cancel']='not';
      $data['status']='active';

      DB::table('perday_patients')->insert($data);
      return redirect()->back()->with('msg','Information add Successfully');  



    }

    public function sperdayedit(Request $request)
    {
      $sdper_id=$request->sdper_id;
      $res=Perday_patient::find($sdper_id);
     return response()->json($res);

    }

    public function showtime(Request $request)
    {
      $day=$request->day;
       $doctor_id=$request->doctor_id;
       $time =Scheduale::where('doctor_id',$doctor_id)->where('se_day',$day)->first();
       return response()->json($time);

    }

    public function dayupdate(Request $request)
    {
        $this->validate($request, [
           'total' =>'required',
           'day' =>'required',
           'date' =>'required',
           'place' =>'required',
           'address' =>'required',
           'strat_time' =>'required',


       ]);
      $id =$request->id;
      $nameOfDay = date('D', strtotime($request->date));
      $day =$request->day;
      if ($nameOfDay !==$day) {
        return redirect()->back()->with('emsg','Day And date Not match');
      }
      $res =Perday_patient::find($id);
      $res->place=$request->place;
      $res->address=$request->address;
      $res->strat_time=$request->strat_time;
      $res->end_time=$request->end_time;

      $res->total=$request->total;
      $res->day=$request->day;
      $res->date=$request->date;
      $res->cancel='not';
      $res->status='active';

      $res->save();
      return redirect()->back()->with('msg','Information Update Successfully');  



    }

    public function user()
    {
      $user =Doctor::where('roll_id','2')->get();
      return view('doctor.setting.user',compact('user'));
    }

    public function user_store(Request $request)
    {
        $this->validate($request, [
          'name'     =>  'required',
          'email'  =>  'required|email|unique:doctors',
          'password' =>  'required'
     ]);

        $user =new Doctor();
        $user->roll_id ='2';
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =MD5($request->password);
        $user->save();
         return redirect()->back()->with('msg','User Create Successfully'); 


    }

    public function user_delete($id)
    {
      $doctor =Doctor::find($id);
      $doctor->delete();
      return redirect()->back()->with('msg','User Delete Successfully'); 
    }

    public function cancel($id)
    {
      $cancel =Perday_patient::find($id);
      $cancel->cancel='yes';
      $cancel->status='inactive';
      $cancel->save();
      $date=$cancel->date;
      // $num =Appointment::where('ap_date',$date)->get();
      // foreach ($num as $key => $value) {
      //   $mess ='dear '.$value->pat_f_name.' unfortunately '.$value->ap_date.' appointment will cancel';
      // $to = $value->ap_mobile;
      // $token = "6820abc030fca9eb59e24ec6e019f2c4";
      // $message = $mess;

      // $url = "http://api.greenweb.com.bd/api.php";


      // $data= array(
      // 'to'=>"$to",
      // 'message'=>"$message",
      // 'token'=>"$token"
      // ); // Add parameters in key value
      // $ch = curl_init(); // Initialize cURL
      // curl_setopt($ch, CURLOPT_URL,$url);
      // curl_setopt($ch, CURLOPT_ENCODING, '');
      // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
      // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
      // $smsresult = curl_exec($ch);
      // }
      return redirect()->back()->with('msg','Appointment cancel Successfully'); 


    }

    public function sc_active($id)
    {
     $active =Perday_patient::find($id);
     $active->status='inactive';
     $active->save();
      return redirect()->back()->with('msg','Appointment Inactive'); 

    }

    public function sc_inactive($id)
    {
      $active =Perday_patient::find($id);
     $active->status='active';
     $active->save();
      return redirect()->back()->with('msg','Appointment Inactive'); 
    }
}
