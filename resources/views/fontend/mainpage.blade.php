@extends('fontpage')
@section('title','doctor')
@push('css')
    <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet">

@endpush
@section('content')
    <section id="slider-wrapper">

    	@php
    		$slider =DB::table('sliders')->where('status','yes')->orderBy('id','desc')->take(3)->get();

    	@endphp
        <div id="owl-slider" class="owl-carousel owl-theme">
            <!-- slider item one -->
       @foreach ($slider as $element)
       	            <div class="item" style="background-image: url({{asset($element->image)}})">
                <div class="item-text-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h1>
                                    <span>
                                      {{$element->title}}
                                    </span>
                                   </h1>
                                <p> {{$element->sub_title}}</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       @endforeach


            <!-- /.slider item three -->
        </div>
    </section>

  

    <!-- About section
        ================================ -->
        @php
            $about =DB::table('aboutuses')->first();
        @endphp
    <section id="about" class="about-inner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-5 my-padding">
                    <div class="about-grid-inner">
                        <div class="about-grid">
                            <div class="about-icon">
                                <img src="{{asset('fontend/public/images/icon-4.png')}}" alt="">
                            </div>
                            <div class="grid-detail">
                                <h3>ডাক্তার স্পেশালিটি</h3>
                                <p>{{$about->special}}</p>
                            </div>
                        </div>

                        <div class="about-grid">
                            <div class="about-icon"><img src="{{asset('fontend/public/images/icon-5.png')}}" alt=""></div>
                            <div class="grid-detail">
                                <h3>ডাক্তার ডিগ্রী</h3>
                                <p>{{$about->degree}}</p>
                            </div>
                        </div>
                        <div class="about-grid">
                            <div class="about-icon"><img src="{{asset('fontend/public/images/icon-6.png')}}" alt=""></div>
                            <div class="grid-detail">
                                <h3>ডাক্তারের অভিজ্ঞতা</h3>
                                <p>{{$about->experience}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="history-inner">
                        <h5>আমাদের সম্পর্কে</h5>
                        <h3>{{$about->Full_Name}}</h3>
                      
                        <p>{{$about->about}}</p>
                        
                    </div>
                </div>

                <div class="col-sm-4  ">
                    <div class="about-img">
                        <img src="{{asset($about->image)}}" alt="{{$about->image}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    @php
      $perday =DB::table('perday_patients')->where('cancel','not')->where('status','active')->take(3)->get();
    @endphp
    
<!--    card section -->
      <section class="card-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                   <h2 class="text-center bate-time"> রোগী দেখার স্থান ও সময় </h2>
                    <div class="row">
                      @foreach ($perday as $sd)
                          <div class="col-sm-4">
                            <div class="counter-box" style="color: #000">
                                <ul>
                                    <li><img src="{{asset('fontend/public/images/hospital_logo.png')}}" class="img-responsive" alt=""></li>
                                    
                                </ul>
                                <h4>{{$sd->place}}</h4>
                                <p class="well">ঠিকানা  : {{$sd->address}}</p>
                                <p class="well">তারিখ    : {{$sd->date}}</p>
                                <p class="well">দিন       :                   
                                 @if($sd->day =='Fri')
                                 শুক্রবার
                                 @elseif($sd->day =='Sat')
                                 শনিবার
                                 @elseif($sd->day =='Sun')
                                 রবিবার
                                 @elseif($sd->day =='Mon')
                                 সোমবার
                                 @elseif($sd->day =='Tue')
                                  মঙ্গলবার
                                 @elseif($sd->day =='Wed')
                                   বুধবার
                                 @elseif($sd->day =='Thu')
                                  বৃহস্পিবার
                                  @endif</p>
                                <p class="well">সময়      : {{$sd->strat_time}} হইতে {{$sd->end_time}} </p>
                            </div>
                        </div>
                      @endforeach
        
    

                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Appointment section
        ==================================== -->
    <section id="appointment" class="appointment-inner">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 mx-auto">

                    <div class="tab">
                        <ul class="tabs">
                            <li><a href="#"> সরাসরি অ্যাপয়েন্টমেন্ট </a></li>
                        </ul>
                        <!-- / tabs -->
                        <div class="tab_content">
                            <!-- / tabs_item -->
                            @php
                                $doctor =DB::table('doctors')->where('roll_id',1)->first();

                            @endphp
                            <div class="tabs_item">
                                <form action="{{ route('apointment') }}" method="post" id="addForm" >
                                  <div class="row">
                                    <input type="hidden" name="doctor_id" id="doctor_id" value="{{$doctor->id}}" />
                                    <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                        <input type="text" class="form-control" id="pat_f_name" name="pat_f_name" placeholder="নাম">
                                    </div>
                                  </div>
                                   <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone "></i></span>
                                        <input type="text" class="form-control" name="ap_mobile" id="ap_mobile" placeholder="ফোন নম্বর" >
                                    </div>
                                  </div>
                                   <div class="col-md-6">

                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                                <input type="text" class="form-control" id="age" name="age" placeholder="বয়স">
                                            </div>
                                        </div>

                                  <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input type="text" class="form-control" id="ap_address" name="ap_address" placeholder="ঠিকানা">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <select class="form-control" name="state" id="state">
                                            <option value=''>রোগী দেখার স্থান</option>
                                            @foreach ($perday as $place)
                                            <option value='{{$place->address}}'>{{$place->address}}</option>
                                            @endforeach
                                           
                                          
                                        </select>
                                    </div>
                                  </div>
                                    <div class="col-md-6">

                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control datepicker1" name="ap_date" id="ap_date" placeholder="রোগী দেখার তারিখ">
                                    </div>
                                  </div>
                                       <div class="col-md-12">
                                         <div id="show"></div>
                                       </div>
                                       <div class="col-md-12">
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                        <input type="text" class="form-control" name="doc_fee" id="doc_fee" placeholder="Doctor fee" readonly>
                                         </div>
                                       </div>


                                <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="control-label">লিঙ্গ </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="Male" name="gender">পুরুষ </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="Female" name="gender" >মহিলা </label>
                                    </div>
                                </div>


                                   <div class="col-md-12">
                                      <div class="form-group">
                                        <textarea class="form-control" id="problem" name="problem" placeholder="প্রবলেম" maxlength="140" rows="7"></textarea>
                                    </div>
                                   </div>
                                   <div class="col-md-12">
                                      <input type="submit" id="submit2" name="submit2" class="btn btn-blue btn-block" value="SUBMIT">
                                   </div>
                                   </div>
                                </form>
                            </div>
                            <!-- / tabs_item -->
                        </div>
                        <!-- / tab_content -->
                    </div>
                    <!-- / tab -->
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
 <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script>
 <script>
          @if(session('msg'))
        
                toastr.success('{{session('msg')}}');
         @endif
      
  @if ($errors->any())
      @foreach ($errors->all() as $error)
        
                toastr.error('{{$error}}');
      @endforeach
     @endif 

       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
$(document).on('change','#ap_date,#ap_mobile',function () { 
    var ap_date =$("#ap_date").val();
    var ap_mobile=$("#ap_mobile").val();

  if (ap_mobile != "" && ap_date != "") {
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/checkmobile')}}",
              data : {ap_date:ap_date,ap_mobile:ap_mobile},
              dateType: 'json',
              success: function(data){
                if (data.success) {

                toastr.success(data.success);
                }
                else
                {
                     $("#ap_mobile").val('');
                      $("#ap_date").val('');
                    toastr.error(data.error);  
                }
               

               }

              
            });

       } 
  });
 </script>

 <script>
       $("#ap_date").change(function(){

    var ap_date =$(this).val();
    var doctor_id =$("#doctor_id").val();

          $.ajax({

              type: 'POST',
              url: "{{URL::to('/scheduale/exit')}}",
              data : {ap_date:ap_date,doctor_id:doctor_id},
              dateType: 'text',
              success: function(data){
            
             if (data) {

              toastr.success('This '+data+' day Schedaule are Available');
              $.ajax({

              type: 'POST',
              url: "{{URL::to('/scheduale/exitfee')}}",
              data : {ap_date:ap_date,doctor_id:doctor_id},
              dateType: 'text',
              success: function(data){
            
             $("#doc_fee").val(data);
           
   
               }

              
            });

              //
               $.ajax({

              type: 'POST',
              url: "{{URL::to('/apointment/exitnum')}}",
              data : {ap_date:ap_date,doctor_id:doctor_id},
              dateType: 'text',
              success: function(data){
            
            if (data) {
              $("#show").show();
              $("#show").html(data);
               }
               else
               {
                 toastr.warning('This day Schedaule are already booked or not created at all');
               $("#ap_date").val('');
               $("#doc_fee").val('');
               $("#show").hide();
               }
           
   
               }

              
            });
             }
             else
             {
               toastr.error('This day Schedaule are not Available');
               $("#ap_date").val('');
               $("#doc_fee").val('');
               $("#show").hide();
             }
   
               }

              
            });

       

        
  });
 </script>

 <script>
     // insert......
$('#addForm').on('submit', function(e){
   
   e.preventDefault();
   var form = $(this).serialize();
   var url = $(this).attr('action');
 

     $.ajax({

              type: 'POST',
              url: url,
              data :form,
              dateType: 'json',
              success: function(data){
                if (data.errors) {
                jQuery.each(data.errors, function(key, value){
                        // jQuery('.alert-danger').show();
                        // jQuery('.alert-danger').append('<p>'+value+'</p>');
                        toastr.error(value);
                      });
              }
              else
              {
                console.log(data.success);
                toastr.success(data.success);
                setTimeout(function(){// wait for 5 secs(2)
                 location.reload(); // then reload the page.(3)
                }, 5000); 
              }

               }              
            });
 });
 </script>

@endpush