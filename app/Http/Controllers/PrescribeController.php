<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Case_medi;
use App\Case_study;
use App\Case_test;
use DB;


class PrescribeController extends Controller
{
    public function newpres($id,$pid)
    {
    	return view('doctor.prescribe.newpres',compact('id','pid'));
    }
   
   public function printpres()
   {
   	return view('doctor.prescribe.presprint');
   }
    public function newpesstore(Request $request,$id,$de)
    {
    	$apointment=$id;
    	$casename=$request->casename;
    	$medicine_name=$request->medicine_name;
    	$medicine_qty=$request->medicine_qty;
    	$instruction=$request->instruction;
    	$meal=$request->meal;
    	$days=$request->days;
    	$dia=$request->dia;
        $medicine_type =$request->medicine_type;
    	date_default_timezone_set('asia/dhaka');
        $date=date('m-d-Y');
        if ($casename) {
      
       for ($j=0; $j <count($casename) ; $j++) { 
       	    if ($casename[$j] !=null) {
       	    	$case =new Case_study();
       	    	$case->casename=$casename[$j];
       	    	$case->pa_id=$id;
       	    	$case->date=$date;
       	    	$case->save();
       	    }
       }
       }
        if ($medicine_name) {
     
        for ($i=0; $i <count($medicine_qty) ; $i++) { 
        	if ($medicine_qty[$i] !=null) {
        		$medi =new Case_medi();
        		$medi->pa_id=$id;
        		$medi->medicine_name=$medicine_name[$i];
                $medi->medicine_type =$medicine_type[$i];
        		$medi->medicine_qty=$medicine_qty[$i];
        		$medi->instruction=$instruction[$i];
        		$medi->meal=$meal[$i];
        		$medi->days=$days[$i];
        		$medi->date=$date;
        		$medi->save();
        	}
        }
        }
       if ($dia) {
     
        for ($x=0; $x <count($dia) ; $x++) { 
        	if ($dia[$x] !=null) {
        		$diaa =new Case_test();
        		$diaa->pa_id=$id;
        		$diaa->dia=$dia[$x];
        		$diaa->date=$date;

        		$diaa->save();

        	}
        }
        }
        // else
        // {
        // 	return redirect()->back()->with('emsg','Something Wrong not create prescribe');
        // }
        $up = DB::table('appointments')->where('pa_id',$id) ->update(['ap_status' => 'receive']);
        
        return redirect()->route('admin.prescribe.printpres',compact('apointment'));

    }


    public function oldpesstore(Request $request,$id,$de)
    {
        $apointment=$id;
        $casename=$request->casename;
        $medicine_name=$request->medicine_name;
        $medicine_qty=$request->medicine_qty;
        $instruction=$request->instruction;
        $meal=$request->meal;
        $days=$request->days;
        $dia=$request->dia;
        $medicine_type =$request->medicine_type;
        date_default_timezone_set('asia/dhaka');
        $date=date('m-d-Y');
        if ($casename) {
      
       for ($j=0; $j <count($casename) ; $j++) { 
            if ($casename[$j] !=null) {
                $case =new Case_study();
                $case->casename=$casename[$j];
                $case->pa_id=$id;
                $case->date=$date;
                $case->save();
            }
       }
       }
        if ($medicine_name) {
     
        for ($i=0; $i <count($medicine_qty) ; $i++) { 
            if ($medicine_qty[$i] !=null) {
                $medi =new Case_medi();
                $medi->pa_id=$id;
                $medi->medicine_name=$medicine_name[$i];
                $medi->medicine_type =$medicine_type[$i];
                $medi->medicine_qty=$medicine_qty[$i];
                $medi->instruction=$instruction[$i];
                $medi->meal=$meal[$i];
                $medi->days=$days[$i];
                $medi->date=$date;
                $medi->save();
            }
        }
        }
       if ($dia) {
     
        for ($x=0; $x <count($dia) ; $x++) { 
            if ($dia[$x] !=null) {
                $diaa =new Case_test();
                $diaa->pa_id=$id;
                $diaa->dia=$dia[$x];
                $diaa->date=$date;

                $diaa->save();

            }
        }
        }
        // else
        // {
        //     return redirect()->back()->with('emsg','Something Wrong not create prescribe');
        // }
        $up = DB::table('old_apoints')->where('pa_id',$id) ->update(['ap_status' => 'receive']);
        
        return redirect()->route('admin.prescribe.printpres',compact('apointment'));

    }
    public function prevouspres1(Request $request)
    {
    	 $ap=$request->prev_id;
    	 $date=date('m-d-Y');
    	 if ($ap !=null) {
    	$casee =DB::table('case_studies')->where('pa_id',$ap)->first();
         $case =DB::table('case_studies')->where('pa_id',$ap)->get();
         $test =DB::table('case_tests')->where('pa_id',$ap)->get();
         $medi =DB::table('case_medis')->where('pa_id',$ap)->get();
         if ($casee->casename) {
         	 $result='<div>';
         	 $result.='<p style="text-align:center;background:#3C8dbc;color:#fff">Patient Case History</p>';
         	 $result.='<table class="table">';
		 foreach ($case as $key => $value) {
		 	 $result.='<tr><td>Case Name:</td><td>'.$value->casename.'</td></tr>';
		 }
			 $result.='</table>';
			 $result.='<p style="text-align:center;background:#3C8dbc;color:#fff">Patient Medicine History</p>';
			 $result.='<table class="table">';
			 $result.='<tbody><tr><td>Name</td><td>Qty</td><td>Instruction</td><td>Taking</td><td>Days</td></tr></tbody>';
		 foreach ($medi as $key => $value1) {
		 	$result.='<tr><td>'.$value1->medicine_name.'</td>';
		 	$result.='<td>'.$value1->medicine_qty.'</td>';
		 	$result.='<td>'.$value1->instruction.'</td>';
		 	$result.='<td>'.$value1->meal.'</td>';

		 	$result.='<td>'.$value1->days.'</td></tr>';

		 }
		    $result.='</table>';
		 if ($test) {
		    $result.='<p style="text-align:center;background:#3C8dbc;color:#fff">Patient Test History</p>';
		 	$result.='<table class="table">';
		 foreach ($test as $key => $value2) {
		 	$result.='<tr><td>test Name:</td><td>'.$value2->dia.'</td></tr>';
		 }
		    $result.='</table>';
		 	
		 }
		    $result.='</div>';
		return $result;
         }
          
     }
    }

    public function oldpress($id,$pid)
    {
        return view('doctor.prescribe.oldpress',compact('id','pid'));
 
    }
}
