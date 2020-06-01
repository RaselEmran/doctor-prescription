@extends('welcome')
@section('title','New Appointment')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
       <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/select2/dist/css/select2.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row">
    <div class="col-md-8" style="width: 80%;margin: auto; padding-top: 20px">
                      <div class="card">
                        <div class="card-header" style="background: #5A9599;color: #fff">
                          <h3>New Apointment</h3>
                        </div>
                            <form method="POST" action="{{route('admin.appointment.newapstore')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor name </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden" class="form-control" name="doctor_id" id="doctor_id" value="<?php echo Session::get('doctor_id')?>">
                          </div>

                           <label for="">Patient name</label>
                          <div class="form-group">
                          <input type="text" name="pat_f_name" class="form-control" >
                          </div>

                           <label for="">Mobile Num</label>
                          <div class="form-group">
                          <input type="text" name="ap_mobile" class="form-control" >
                          </div>

                           <label for="">Email Address*</label>
                          <div class="form-group">
                          <input type="text" name="ap_email" class="form-control" >
                          </div>

                            <div class="form-group">
                           <label for="">Sex</label>
                            <input name="gender" type="radio" id="radio_32" class="with-gap radio-col-purple" value="Male"  />
                            <label for="radio_32">Male</label>
                            <input name="gender" type="radio" id="radio_33" class="with-gap radio-col-deep-purple" value="Female"  />
                            <label for="radio_33">Female</label>

                           </div>

                          <label for="">Age</label>
                          <div class="form-group">
                          <input type="text" name="age" class="form-control" >
                          </div>

                           <label for="">Address</label>
                          <div class="form-group">
                          <input type="text" name="ap_address" class="form-control" >
                          </div>

                            <label for="">Problem</label>
                          <div class="form-group">
                          <input type="text" name="problem" id="problem" class="form-control" >
                          </div>
                           <label> Available Days</label>
                          <div class="form-group">
                        <input type="text" name="ap_date" class="form-control ap_date" id="ap_date" placeholder="yyyy-mm-dd">
                          </div>
                          <div id="show"></div>
                           <label for="">Doctor Fee</label>
                          <div class="form-group">
                          <input type="text" name="doc_fee" id="doc_fee" class="form-control" >
                          </div>
                         
                          <button class="btn btn-danger" type="reset" >Cancel</button>
                          <button class="btn btn-primary" type="submit">Add</button>
                          </div>
                        </form>
                        </div>
                       
    </div>
</div>

@endsection
@push('js')
 <script src="{{asset('/backend/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/backend/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <!-- <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script> -->
  <script>
        $(".select2").select2();
    /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        var date = new Date();
         date.setDate(date.getDate());
        jQuery('#ap_date').datepicker({
            format: 'yyyy-mm-dd',
            // startDate: '-3d',
            autoclose: true,
            startDate: date,
            todayHighlight: true
        });
     @if(session('msg'))
        
                toastr.success('{{session('msg')}}');
     @endif
      
         @if ($errors->any())
      @foreach ($errors->all() as $error)
        
                toastr.error('{{$error}}');
      @endforeach
     @endif     
  </script>

  <script>
    
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


  $("#ap_date").change(function(){

    var ap_date =$(this).val();
    var doctor_id =$("#doctor_id").val();

          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/scheduale/exit')}}",
              data : {ap_date:ap_date,doctor_id:doctor_id},
              dateType: 'text',
              success: function(data){
            
             if (data) {
              toastr.success('This '+data+' day Schedaule are Available');
              $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/scheduale/exitfee')}}",
              data : {ap_date:ap_date,doctor_id:doctor_id},
              dateType: 'text',
              success: function(data){
            
             $("#doc_fee").val(data);
           
   
               }

              
            });

              //
               $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/apointment/exitnum')}}",
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
@endpush