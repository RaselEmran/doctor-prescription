<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use App\Medicine;
class MedicineController extends Controller
{
   public function category()
   {
    $category= Category::orderBy('id','desc')->get();
   	return view('doctor.medicine.category',compact('category'));
   }

   public function category_store(Request $request)
   {
   			$validator = Validator::make($request->all(), [
           'name' =>'required',
           'description' =>'required',
        ]);

      if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	$category =new Category();
        	$category->name =$request->name;
        	$category->description =$request->description;
        	$category->save();
        	return response()->json(['success'=>'Record is successfully added']);

        }
   }

   public function catedit(Request $request)
   {
   	$cat_id =$request->cat_id;
   	$medicine =Category::find($cat_id);
   	return response()->json($medicine);
   }

   public function upcatedit(Request $request)
   {
   	 $validator = Validator::make($request->all(), [
           'name' =>'required',
           'description' =>'required',
        ]);

      if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	$id =$request->id;
        	$category =Category::find($id);
        	$category->name =$request->name;
        	$category->description =$request->description;
        	$category->save();
        	return response()->json(['success'=>'Record is successfully Updated']);

        }
   }

   public function catdelete(Request $request)
   {
   	$id= $request->id;
   	$category =Category::find($id);
   	$category->delete();
   	return response()->json(['success'=> true,'message'=>'Record is successfully Updated']);
   }

   public function medi_list()
   {
   	$medi =Medicine::orderBy('id','desc')->get();
   	return view('doctor.medicine.medicine',compact('medi'));
   }

   public function medi_append(Request $request)
   {
   	$getNewOrderItem =$request->getNewOrderItem;
   	if ($getNewOrderItem) {
   		return view('doctor.medicine.appen');
   	}
   }

   public function medistore(Request $request)
   {
   	$category_name =$request->category_name;
   	$medi_name =$request->medi_name;
   	$genaric_name =$request->genaric_name;
    if ($category_name) {
 
   	for ($i=0; $i <count($genaric_name) ; $i++) { 
   		if ($genaric_name[$i] !=null && $medi_name[$i] !=null && $category_name[$i] !=null) {
   		$a= $category_name[$i];
   		  	$cat =Category::find($a);
   		  	$cat_name= $cat->name;
   		  	$medicine =new Medicine();
   		  	$medicine->category_id =$category_name[$i];
   		  	$medicine->category_name =$cat_name;
   		  	$medicine->medi_name =$medi_name[$i];
   		  	$medicine->genaric_name =$genaric_name[$i];
   		  	$medicine->save();

   		}
   		else
   		{
   			return response()->json(['warning'=>'Record not Added']);	
   		}
   	}
   	 	return response()->json(['success'=>'Record is successfully Updated']);
  }
  else
  {
   	return response()->json(['error'=>'Something Wrong Medicine not add']);

  }

   }

   public function medi_edit(Request $request)
   {
   	$medi_id =$request->medi_id;
   	$medicine =Medicine::find($medi_id);
   	return response()->json($medicine);
   }

   public function mediupdate(Request $request)
   {
   		 $validator = Validator::make($request->all(), [
           'category_id' =>'required',
           'medi_name' =>'required',
           'genaric_name' =>'required',

        ]);

   	 if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        else
        {
        	$id =$request->id;
        	$catid =$request->category_id;
        	$cat =Category::find($catid);
        	$cat_name =$cat->name;
        	$medicine = Medicine::find($id);
        	$medicine->category_id =$request->category_id;
        	$medicine->medi_name =$request->cat_name;
        	$medicine->medi_name =$request->medi_name;

        	$medicine->genaric_name =$request->genaric_name;
        	$medicine->save();
        	return response()->json(['success'=>'Record is successfully added']);

        }
   }

   public function medi_delete(Request $request)
   {
   	$id= $request->id;
   	$medicine =Medicine::find($id);
   	$medicine->delete();
   	return response()->json(['success'=> true,'message'=>'Record is successfully Deleted']);
   }
}
