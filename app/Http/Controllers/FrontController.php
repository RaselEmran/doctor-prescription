<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Aboutus;
use App\Blogpost;
use App\Tag;
use App\Posttag;
use App\Extra;


use Validator;


use DB;

class FrontController extends Controller
{
   public function slider()
   {
   	$alls =Slider::all();
   	return view('doctor.font.slider',compact('alls'));
   }

   public function slider_store(Request $request)
   {
   		$request->validate([
	    'image' => 'required|mimes:jpeg,bmp,png|max:2000',
	    'title' => 'required',
	    'sub_title' => 'required'

 
		]);
        $image=$request->file('image');
    	 if ($image) {

             $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'backend/slider/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

         }
		$slider =New Slider();
		$slider->title =$request->title;
		$slider->sub_title =$request->sub_title;
		$slider->image =$image_url;
    $slider->status ='yes';

		$slider->save();
        return redirect()->back()->with('msg','Slider add Succesfully');



   }

   public function slider_edit(Request $request)
   {
     $sld_id =$request->sld_id;
     $slider =Slider::find($sld_id);
     return response()->json($slider);
   }
    public function slider_up(Request $request)
    {
          $request->validate([
      'image' => 'mimes:jpeg,bmp,png|max:2000',
      'title' => 'required',
      'sub_title' => 'required'

 
     ]);
          $id =$request->id;
          $slider =Slider::find($id);
          $image=$request->file('image');
       if ($image) {
             unlink($slider->image);
             $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'backend/customer/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

         }
         else{
          $image_url = $slider->image;
         }
    $slider->title =$request->title;
    $slider->sub_title =$request->sub_title;
    $slider->image =$image_url;
    $slider->status='yes';
    $slider->save();
        return redirect()->back()->with('msg','Slider Update Succesfully');
    }

    public function slider_ac($id)
    {
       $pass =DB::table('sliders')->where('id',$id)->update(['status'=>'no']);
        return redirect()->back()->with('msg','Status Update Succesfully');

    }

    public function slider_inac($id)
    {
        $pass =DB::table('sliders')->where('id',$id)->update(['status'=>'yes']);
        return redirect()->back()->with('msg','Status Update Succesfully');
    }
    public function about()
    {
      $aboutus =Aboutus::First();
      return view('doctor.font.about',compact('aboutus'));
    }
    public function about_store(Request $request)
    {
      $count =Aboutus::count();

      if ($count==0) {
     $request->validate([
      'image' => 'required|mimes:jpeg,bmp,png|max:2000',
      'Full_Name' => 'required',
      'special' => 'required',
      'degree' => 'required',
      'experience' => 'required',
      'about' => 'required',
     ]);

        $image=$request->file('image');
       if ($image) {

             $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'backend/about/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

         }
         $about =new Aboutus();
          $about->doc_id =$request->doc_id;
         $about->Full_Name =$request->Full_Name;
         $about->special =$request->special;
         $about->degree =$request->degree;
         $about->experience =$request->experience;
         $about->about =$request->about;
         $about->image =$image_url;
         $about->save();
        return redirect()->back()->with('msg','About Info add Succesfully');


      }
      else
      {
        $about =Aboutus::find('1');
        $image=$request->file('image');
       if ($image) {
             unlink($about->image);
             $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'backend/customer/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

         }
         else{
          $image_url = $about->image;
         }
         $about->doc_id =$request->doc_id;
         $about->Full_Name =$request->Full_Name;
         $about->special =$request->special;
         $about->degree =$request->degree;
         $about->experience =$request->experience;
         $about->about =$request->about;
         $about->image =$image_url;
         $about->save();
        return redirect()->back()->with('msg','About Info Update Succesfully');
      }
    }

    public function tagstore(Request $request)
    {
      $this->validate($request, [
           'name' => 'required',
        ]);

     $tag =new Tag();
     $tag->name=$request->name;
     $tag->save();
     return redirect()->back()->with('msg','Tag Name Add Succesfully');

    }

    public function blog()
    {
      return view('doctor.font.blog');
    }

    public function blogstore(Request $request)
    {
       $this->validate($request, [
           'title' => 'required',
          'image' => 'required|mimes:jpeg,bmp,png|max:2000',
           'body' => 'required',
           'tag_id' => 'required',
           'status' => 'required',

        ]);
        date_default_timezone_set('asia/dhaka');
        $date =date ("l, d F Y, h:i:s A");
        $image=$request->file('image');
       if ($image) {

             $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'backend/post/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

         }
         $tag_id =$request->tag_id;
       $post =new Blogpost();
       $post->doctor_id =$request->doctor_id;
       $post->doctor_name =$request->doctor_name;
       $post->title =$request->title;
       $post->body =$request->body;
       $post->image =$image_url;
       $post->view_count =0;
       $post->status =$request->status;
       $post->date =$date;
       $post->save();
       $postid = $post->id;
       for ($i=0; $i <count($tag_id) ; $i++) { 
         $posttag =new Posttag();
         $posttag->post_id =$postid;
         $posttag->tag_id =$tag_id[$i];
         $posttag->save();
       }
     return redirect('admin/fontpage/postlist')->with('msg','Post Added Succesfully');

    }

    public function postlist()
    {
      $post =Blogpost::orderBy('id','desc')->get();
      return view('doctor.font.postlist',compact('post'));
    }
    public function postedit($id)
    {
      $post =Blogpost::find($id);
      $tags =Posttag::where('post_id',$id)->get();
      return view('doctor.font.postedit',compact('post','tags'));
    }

    public function postupdate(Request $request,$id)
    {
      $this->validate($request, [
           'title' => 'required',
          'image' => 'mimes:jpeg,bmp,png|max:2000',
           'body' => 'required',
           'tag_id' => 'required',
           'status' => 'required',

        ]);

      $post =Blogpost::find($id);
         date_default_timezone_set('asia/dhaka');
         $date =date ("l, d F Y, h:i:s A");
         $image=$request->file('image');
       if ($image) {
             unlink($post->image);
             $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name.'.'.$ext;
             $upload_path = 'backend/post/';
             $image_url = $upload_path.$image_full_name;
             $success = $image->move($upload_path,$image_full_name);

         }
    else{
          $image_url = $post->image;
         }
           $tag_id =$request->tag_id;
       $post->doctor_id =$request->doctor_id;
       $post->doctor_name =$request->doctor_name;
       $post->title =$request->title;
       $post->body =$request->body;
       $post->image =$image_url;
       $post->view_count =0;
       $post->status =$request->status;
       $post->date =$date;
       $post->save();
       $tags =Posttag::where('post_id',$id);
       $delete=$tags->delete();
       if ($delete) {
        for ($i=0; $i <count($tag_id) ; $i++) { 
         $posttag =new Posttag();
         $posttag->post_id =$id;
         $posttag->tag_id =$tag_id[$i];
         $posttag->save();
       }
       }
     return redirect('admin/fontpage/postlist')->with('msg','Post Update Succesfully');

    }

    public function extra()
    {
      $extra =Extra::find('1');
      return view('doctor.font.extra',compact('extra'));
    }

    public function extra_store(Request $request)
    {
      $count =Extra::count();
      if ($count ==0) {
        $this->validate($request, [
           'fb_link' => 'required',
           'twiter_link' => 'required',
           'google_plus' => 'required',
           'email' => 'required',
           'mobile' => 'required',
           'contact' => 'required',


        ]);
        $extra =new Extra();
        $extra->fb_link=$request->fb_link;
        $extra->twiter_link=$request->twiter_link;
        $extra->google_plus=$request->google_plus;
        $extra->email=$request->email;
        $extra->mobile=$request->mobile;
        $extra->contact=$request->contact;
        $extra->save();
        return redirect()->back()->with('msg','Information add Successfully');

      }

      else
      {
        $extra =Extra::find('1');
        $extra->fb_link=$request->fb_link;
        $extra->twiter_link=$request->twiter_link;
        $extra->google_plus=$request->google_plus;
        $extra->email=$request->email;
        $extra->mobile=$request->mobile;
        $extra->contact=$request->contact;
        $extra->save();
        return redirect()->back()->with('msg','Information add Successfully');
      }
    }
}
