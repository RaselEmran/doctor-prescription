<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/logout','SuperAdminController@logout')->name('logout');

Route::get('/admin','DoctorController@index');
Route::post('/admin/login','DoctorController@login')->name('admin.login');

Route::group(['as'=>'admin.','prefix'=>'admin','middleware' => ['Admin']], function(){
	     Route::get('/dashboard','DoctorController@showdashbord')->name('dashboard');
	     Route::get('/profile','DoctorController@profile')->name('profile');
	     Route::post('/profile-from/{id}','DoctorController@profile_from')->name('profile-from');
	     Route::get('/change','DoctorController@change')->name('change');
	     Route::post('/sett/change','DoctorController@pass');
	     Route::post('/pass-change/{id}','DoctorController@pass_change')->name('pass-change');
	     //user
	     Route::get('/user','DoctorController@user')->name('user');
	     Route::post('/user/usstore','DoctorController@user_store')->name('user.usstore');
	     Route::get('/user/delete/{id}','DoctorController@user_delete')->name('user.delete');

	     //
	     Route::get('/scheduale','DoctorController@scheduale')->name('scheduale');
	     Route::post('/schedule/store','DoctorController@sstore')->name('schedule.store');
	     Route::post('/scheduale/edit','DoctorController@sedit');
	     Route::post('/schedule/update','DoctorController@supdate')->name('schedule.update');
	     Route::post('/scheduale/showtime','DoctorController@showtime')->name('schedule.showtime');
	     Route::get('/scheduale/cancel/{id}','DoctorController@cancel')->name('scheduale.cancel');
	     Route::get('/scheduale/sc-active/{id}','DoctorController@sc_active')->name('scheduale.sc-active');
	     Route::get('/scheduale/sc-inactive/{id}','DoctorController@sc_inactive')->name('scheduale.sc-inactive');

	     //
	     Route::get('/perday-patient','DoctorController@perday_patient')->name('perday-patient');
	     Route::post('/perday-patient/daystore','DoctorController@daystrore')->name('perday-patient.daystore');
	     Route::post('/scheduale/sperdayedit','DoctorController@sperdayedit');
	     Route::post('/perday-patient/dayupdate','DoctorController@dayupdate')->name('perday-patient.dayupdate');

	     //appointment
	     Route::get('/appointment/newprint','AppointentController@new_print')->name('appointment.newprint');
	     Route::get('/appointment','AppointentController@index')->name('appointment');
	     Route::get('/appointment/new','AppointentController@new_appoint')->name('appointment.new');
	     Route::post('/scheduale/exit','AppointentController@exit');
	     Route::post('/scheduale/exitfee','AppointentController@exitfee');
	     Route::post('/apointment/exitnum','AppointentController@exitnum');
	     Route::post('/appointment/newapstore','AppointentController@newapstore')->name('appointment.newapstore');
	     Route::post('/newapoint/neapprint','AppointentController@neapprint');
	     Route::get('/appointment/receive','AppointentController@taking')->name('appointment.receive');
	     //old
	     Route::get('/appointment/old','AppointentController@old_appoint')->name('appointment.old');
	     Route::post('/appointment/oldinfo','AppointentController@oldinfo');
	     Route::post('/appointment/oldexitfee','AppointentController@oldexitfee');
	     Route::post('/appointment/oldapstore','AppointentController@oldapstore')->name('appointment.oldapstore');
	     Route::post('/newapoint/oldprint','AppointentController@oldprint');

	     //online..
	     Route::get('/appointment/online','AppointentController@online')->name('appointment.online');

	     //Prescribe
	     Route::get('/prescribe/printpres','PrescribeController@printpres')->name('prescribe.printpres');
	     Route::get('/prescribe/new/{id}/pa-id/{pid}','PrescribeController@newpres')->name('prescribe.new');
	     Route::post('/prescribe/newpesstore/{id}/{de}','PrescribeController@newpesstore')->name('prescribe.newpesstore');
	     Route::post('/prescribe/oldpesstore/{id}/{de}','PrescribeController@oldpesstore')->name('prescribe.oldpesstore');
	     Route::post('/press/prevous','PrescribeController@prevouspres1');
	     Route::get('/prescribe/old/{id}/pa-id/{pid}','PrescribeController@oldpress')->name('prescribe.old');

	     //patient....
	     Route::get('/patient','PatientController@index')->name('patient.index');
	     Route::post('/patient/store','PatientController@store');
	     Route::post('/patient/edit','PatientController@edit');
	     Route::post('/patient/update','PatientController@update')->name('patient.update');
	     Route::get('/patient/patient-apoint','PatientController@patient_apoint')->name('patient.patient-apoint');
	     Route::post('/patient/allinfo','PatientController@pat_info');
	     Route::post('/appointment/patientapoint','PatientController@patientapoint')->name('appointment.patientapoint');
	     Route::get('/patient/taking-apoint','PatientController@taking_apoint')->name('patient.taking-apoint');

	     //medicine
	     Route::get('/medicine/category','MedicineController@category')->name('medicine.category');
	     Route::post('/medicine/catstore','MedicineController@category_store')->name('medicine.catstore');
	     Route::post('/category/catedit','MedicineController@catedit');
	     Route::post('/category/upcatedit','MedicineController@upcatedit')->name('medicine.upcatstore');
	     Route::post('/category/delete','MedicineController@catdelete')->name('category.delete');
	     Route::get('/medicine/list','MedicineController@medi_list')->name('medicine.list');
	     Route::post('/medicine/append','MedicineController@medi_append')->name('medicine.append');
	     Route::post('/medicine/medistore','MedicineController@medistore')->name('medicine.medistore');
	     Route::post('/medicine/medi-edit','MedicineController@medi_edit');
	     Route::post('/medicine/mediupdate','MedicineController@mediupdate')->name('medicine.mediupdate');
	     Route::post('/medicine/medi-delete','MedicineController@medi_delete')->name('medicine.medi-delete');
         //sms
	     Route::get('/sms','SmsController@sms')->name('sms');
	     Route::post('/sms/send','SmsController@send_sms')->name('sms.send');

        //fontpage
	     Route::get('/fontpage/slider','FrontController@slider')->name('fontpage.slider');
	     Route::post('/slider/slider-store','FrontController@slider_store')->name('slider.slider-store');
	     Route::post('/slider/slideredit','FrontController@slider_edit');
	     Route::post('/slider/sld-update','FrontController@slider_up')->name('slider.sld-update');
	     Route::get('/slider/active/{id}','FrontController@slider_ac')->name('slider.active');
	     Route::get('/slider/inactive/{id}','FrontController@slider_inac')->name('slider.inactive');
	     Route::get('/fontpage/about','FrontController@about')->name('fontpage.about');
	     Route::post('/fontpage/about-form','FrontController@about_store')->name('fontpage.about-form');
	     Route::get('/fontpage/blog-post','FrontController@blog')->name('fontpage.blog-post');
	     Route::post('/fontpage/tagstore','FrontController@tagstore')->name('fontpage.tagstore');
	     Route::post('/fontpage/blog-store','FrontController@blogstore')->name('fontpage.blog-store');
	     Route::get('/fontpage/postlist','FrontController@postlist')->name('fontpage.postlist');
	     Route::get('/fontpage/postedit/{id}','FrontController@postedit')->name('fontpage.postedit');
	     Route::post('/fontpage/blog-update/{id}','FrontController@postupdate')->name('fontpage.blog-update');
	     Route::get('/fontpage/extra','FrontController@extra')->name('fontpage.extra');
	     Route::post('/fontpage/extra-form','FrontController@extra_store')->name('fontpage.extra-form');





	});
Route::group(['as'=>'user.','prefix'=>'user','middleware' => ['User']], function(){
	    Route::get('/dashboard','UserController@showdashbord')->name('dashboard');

         //appointment
	     Route::get('/appointment/newprint','UserController@new_print')->name('appointment.newprint');
	     Route::get('/appointment','UserController@index')->name('appointment');
	     Route::get('/appointment/new','UserController@new_appoint')->name('appointment.new');
	     Route::post('/scheduale/exit','UserController@exit');
	     Route::post('/scheduale/exitfee','UserController@exitfee');
	     Route::post('/apointment/exitnum','UserController@exitnum');
	     Route::post('/appointment/newapstore','UserController@newapstore')->name('appointment.newapstore');
	     Route::post('/newapoint/neapprint','UserController@neapprint');
	     Route::get('/appointment/online','UserController@online')->name('appointment.online');
	     Route::get('/apointment/perseprint/{id}','UserController@perseprint')->name('appointment.perseprint');

	     //old
	     Route::get('/appointment/old','UserController@old_appoint')->name('appointment.old');
	     Route::post('/appointment/oldinfo','UserController@oldinfo');
	     Route::post('/appointment/oldexitfee','UserController@oldexitfee');
	     Route::post('/appointment/oldapstore','UserController@oldapstore')->name('appointment.oldapstore');
	     Route::post('/newapoint/oldprint','UserController@oldprint');

	     //patient....
	     Route::get('/patient','UserController@pat_index')->name('patient.index');
	     Route::post('/patient/store','UserController@pat_store');
	     Route::post('/patient/edit','UserController@pat_edit');
	     Route::post('/patient/update','UserController@pat_update')->name('patient.update');
	     Route::get('/patient/patient-apoint','UserController@patient_apoint')->name('patient.patient-apoint');
	     Route::post('/patient/allinfo','UserController@pat_info');
	     Route::post('/appointment/patientapoint','UserController@patientapoint')->name('appointment.patientapoint');
	   

	     Route::get('/change','UserController@change')->name('change');
	     Route::post('/sett/change','UserController@pass');
     

});
Route::get('/','MyController@index');
Route::get('/blog','MyController@blog')->name('blog');
Route::get('/blog/details/{id}','MyController@blog_details')->name('blog.details');
Route::post('/checkmobile','MyController@checkmobile');
 Route::post('/scheduale/exit','AppointentController@exit');
 Route::post('/scheduale/exitfee','AppointentController@exitfee');
 Route::post('/apointment/exitnum','AppointentController@exitnum');
 Route::post('/apointment','MyController@apointment')->name('apointment');
// Route::get('/', function () {
//     return view('adminlogin');
// });
