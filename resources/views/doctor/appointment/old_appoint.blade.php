@extends('welcome')
@section('title','doctor:old Appointment')
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
                          <h3>Old Apointment</h3>
                        </div >
                            <form method="POST" action="{{route('admin.appointment.oldapstore')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                          
                            <div class="modal-body">
                             <label for="">Patient ID</label>
                          <div class="form-group">
                          <input type="text" name="pa_id" id="pat_id" class="form-control" >
                          </div>
                          <div id="info" style="display: none;">
                          <label>Doctor name </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden" class="form-control" name="doctor_id" id="doctor_id" value="<?php echo Session::get('doctor_id')?>">
                          </div>

                           <label for="">Patient name</label>
                          <div class="form-group">
                          <input type="text" name="pat_f_name" id="pat_f_name" class="form-control" readonly >
                          </div>

                           <label for="">Mobile Num</label>
                          <div class="form-group">
                          <input type="text" name="ap_mobile" id="ap_mobile" class="form-control" readonly>
                          </div>

                           <label for="">Email Address*</label>
                          <div class="form-group">
                          <input type="text" name="ap_email" id="ap_email" class="form-control" readonly>
                          </div>

                           <label for="">Address</label>
                          <div class="form-group">
                          <input type="text" name="ap_address" id="ap_address" class="form-control" readonly>
                          </div>

                            <label for="">Sex</label>
                          <div class="form-group">
                          <input type="text" name="gender" id="gender" class="form-control" readonly>
                          </div>

                            <label for="">Age</label>
                          <div class="form-group">
                          <input type="text" name="age" id="age" class="form-control" readonly>
                          </div>

                            <label for="">Problem</label>
                          <div class="form-group">
                          <input type="text" name="problem" id="problem" class="form-control" readonly>
                          </div>
                           <label> Appointment Days</label>
                          <div class="form-group">
                        <input type="text" name="pap_date" class="form-control ap_date" id="pap_date" placeholder="yyyy-mm-dd" readonly>
                          </div>
                            <label> Available Days</label>
                          <div class="form-group">
                        <input type="text" name="ap_date" class="form-control ap_date" id="ap_date" placeholder="yyyy-mm-dd" >
                          </div>
                          <div id="show"></div>
                           <label for="">Doctor Fee</label>
                          <div class="form-group">
                          <input type="text" name="doc_fee" id="doc_fee" class="form-control" readonly >
                          </div>
                         
                          <button class="btn btn-danger" type="reset" >Cancel</button>
                          <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                      </div>
                        </form>
                          </div>
                        
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
//
  $("#pat_id").blur(function(){
    var pat_id =$("#pat_id").val();

 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/appointment/oldinfo')}}",
              data : {pat_id:pat_id},
              dateType: 'json',
              success: function(data){
               if (data) {
                   
                 toastr.success('Correct patient ID');

                   $("#pat_f_name").val(data.pat_f_name);
                   $("#ap_mobile").val(data.ap_mobile);
                   $("#ap_email").val(data.ap_email);
                   $("#ap_address").val(data.ap_address);
                   $("#problem").val(data.problem);
                   $("#pap_date").val(data.ap_date);
                   $("#gender").val(data.gender);
                   $("#age").val(data.age);

                   $("#info").show();

               }
               else
               {
                 toastr.warning('Incorrect patient ID');

                $("#info").hide();
               }
           

               }

              
            });

        
  });



//

  $("#ap_date").change(function(){

    var ap_date =$(this).val();
    var doctor_id =$("#doctor_id").val();
    var pap_date=$("#pap_date").val();

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
              url: "{{URL::to('/admin/appointment/oldexitfee')}}",
              data : {ap_date:ap_date,doctor_id:doctor_id,pap_date:pap_date},
              dateType: 'text',
              success: function(data){
            
              if (data) {

               $("#doc_fee").val(data);
               $("#show").show();
                   }
                  else
                   {
                    toastr.warning('Your Date is already over');
                    $("#show").hide();
                     $("#ap_date").val('');
                   }
         
   
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