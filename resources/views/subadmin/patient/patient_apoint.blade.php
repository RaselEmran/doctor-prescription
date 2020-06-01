@extends('welcome')
@section('title','patient|appointment')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row"> 
   <div class="col-md-12">
         <div class="card">
                           <div style="margin-top: 25px">
                                 <button type="button" class="btn btn-success margin-5" data-toggle="modal" data-target="#Modal1">
                                 Patient Appointment List
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3" style="float: right;">
                                    Create New Apointment
                                </button>
                           </div>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered">
                                             <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>ID</th>
                                                <th>Mobile</th>
                                                <th>Apponit Date</th>

                                                <th>Serial</th>
                                                <th>Pay Status</th>
                                                <th>Appoint Status</th>
                                                <th>Print</th>

                                            
                                            </tr>
                                        </thead>
                                    @foreach ($apointment as $all)
                                    <tr>
                                        <td>{{$all->pat_f_name}}</td>
                                            <td>{{$all->pa_id}}</td>
                                            <td>{{$all->ap_mobile}}</td>
                                            <td>{{$all->ap_date}}</td>

                                            <td>{{$all->serial_no}}</td>
                       
                                            <td>
                                              @if($all->payment_status=='paid')
                                              <span class="badge badge-pill badge-success">Paid</span>
                                              @else
                                              <span class="badge badge-pill badge-danger">UnPaid</span>
                                              @endif

                                            </td>
                                            <td>
                                               @if($all->ap_status=='sending')
                                              <span class="badge badge-pill badge-primary">Send</span>
                                              @else
                                              <span class="badge badge-pill badge-info">Receive</span>
                                              @endif
                                            </td>
                                                <td>
                                               <a href="" class="btn btn-primary margin-5 edit-ap" data-toggle="modal" data-target="#editm"  ap_id="{{$all->id}}">Print</a>
                                             
                                            </td>
                                    
                                    </tr>

                                    @endforeach
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                              <tr>
                                                <th>Patient Name</th>
                                                <th>ID</th>
                                                <th>Mobile</th>
                                                <th>Apponit Date</th>

                                                <th>Serial</th>
                                                <th>Pay Status</th>
                                                <th>Appoint Status</th>
                                                <th>Print</th>
                                            

                                            
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
          </div>

               <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: #5A9599;color: #fff">
                                                <h3 class="modal-title" id="exampleModalLabel">Add New Scheduale </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
             <form method="POST" action="{{route('user.appointment.patientapoint')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor name </label>
                          @php
                            $doctor =DB::table('doctors')->where('roll_id',1)->first();
                           
                          @endphp
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{$doctor->name}}" readonly>
                             <input type="hidden" class="form-control" name="doctor_id" id="doctor_id" value="{{$doctor->id}}">
                          </div>

                          <label for="">Patient ID:</label>
                          <div class="form-group">
                          <input type="text" name="pat_id" id="pat_id" class="form-control" >
                          </div

                           <label for="">Patient name</label>
                          <div class="form-group">
                          <input type="text" name="pat_f_name" id="pat_f_name" class="form-control" readonly >
                          </div>

                           <label for="">Mobile Num</label>
                          <div class="form-group">
                          <input type="text" name="ap_mobile" id="ap_mobile" class="form-control" readonly >
                          </div>

                           <label for="">Email Address*</label>
                          <div class="form-group">
                          <input type="text" name="ap_email" id="ap_email" class="form-control" readonly>
                          </div>

                           <label for="">Address</label>
                          <div class="form-group">
                          <input type="text" name="ap_address" id="ap_address" class="form-control" readonly >
                          </div>

                            <label for="">Problem</label>
                          <div class="form-group">
                          <input type="text" name="problem" id="problem" class="form-control" readonly >
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
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>

<!-- edit -->

               <div class="modal fade" id="editm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background: #5A9599;color: #fff">
                                <h3 class="modal-title" id="exampleModalLabel">Apointment Pay slip</h3>
                                <button type="button" id="close1" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                             <div class="modal-body" style="border: 1px dotted" id="div1">
                               <table class="table">
                                        <tr>
                                          <td>Patient Name</td>
                                          <td><span id="name"></span></td>
                                        </tr>
                                         <tr>
                                          <td>Patient Prob</td>
                                          <td><span id="prob"></span></td>
                                        </tr>
                                         <tr>
                                          <td>atient Moba</td>
                                          <td><span id="mob"></span></td>
                                        </tr>
                                         <tr>
                                          <td>Appointment Date</td>
                                          <td><span id="date"></span></td>
                                        </tr>
                                         <tr>
                                          <td>Doctor Fee</td>
                                          <td><span id="fee"></span></td>
                                        </tr>
                                         <tr>
                                          <td>Serial Number</td>
                                          <td><span id="serial"></span></td>
                                        </tr>
                                      </table>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger"onclick="printContent('div1')" type="button">Print </button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>

@endsection
@push('js')
    <!-- <script src="{{asset('backend/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('backend/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script> -->
    <script src="{{asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_button.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_flash.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_pdfmake.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/extra-libs/datatables_print.min.js')}}"></script>
<script src="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!--   <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script> -->
<script type="text/javascript">
   $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
        ]
    } );


} );
</script>

  <script>
   
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

         var date = new Date();
         date.setDate(date.getDate());
        jQuery('#ap_date').datepicker({
            format: 'yyyy-mm-dd',
            // startDate: '-3d',
            autoclose: true,
            startDate: date,
            todayHighlight: true
        });

        //

        $("#pat_id").focusout(function(){
          var pat_id =$(this).val();
          if (pat_id =="") {
              $("#pat_f_name").val('');
              $("#ap_email").val('');
              $("#ap_mobile").val('');
              $("#ap_address").val('');
          }
         
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/user/patient/allinfo')}}",
              data : {pat_id:pat_id},
              dateType: 'json',
              success: function(data){
               if (data) {
                   toastr.success('Correct patient ID');
              $("#pat_f_name").val(data.patient_name);
              $("#ap_email").val(data.email);
              $("#ap_mobile").val(data.phone);
              $("#ap_address").val(data.address);

              $("#problem").val(data.problem);
             // $("#pat_id").attr('readonly','readonly');


               }

                else
               {
                $("#pat_f_name").val('');
              $("#ap_email").val('');
              $("#ap_mobile").val('');
              $("#ap_address").val('');

              $("#problem").val('');
                 toastr.warning('Incorrect patient ID');

             
               }
              }
              
            });
        });
       //show print
         $(".edit-ap").click(function(){
          var ap_id =$(this).attr('ap_id');

 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/user/newapoint/neapprint')}}",
              data : {ap_id:ap_id},
              dateType: 'json',
              success: function(data){
                 $("#name").text(data.pat_f_name);
                 $("#prob").text(data.problem);
                 $("#mob").text(data.ap_mobile);
                 $("#date").text(data.ap_date);
                 $("#fee").text(data.doc_fee);
                 $("#serial").text(data.serial_no);

               }

              
            });

        
  });
        // appoint

        $("#ap_date").change(function(){

            var ap_date =$(this).val();
            var doctor_id =$("#doctor_id").val();

          $.ajax({

              type: 'POST',
              url: "{{URL::to('/user/scheduale/exit')}}",
              data : {ap_date:ap_date,doctor_id:doctor_id},
              dateType: 'text',
              success: function(data){
            
             if (data) {
              toastr.success('This '+data+' day Schedaule are Available');
              $.ajax({

              type: 'POST',
              url: "{{URL::to('/user/scheduale/exitfee')}}",
              data : {ap_date:ap_date,doctor_id:doctor_id},
              dateType: 'text',
              success: function(data){
            
             $("#doc_fee").val(data);
           
   
               }

              
            });

              //
               $.ajax({

              type: 'POST',
              url: "{{URL::to('/user/apointment/exitnum')}}",
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

        // 

  $(".edit-sd").click(function(){
    var sd_id =$(this).attr('sd_id');
   
 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/user/scheduale/edit')}}",
              data : {sd_id:sd_id},
              dateType: 'json',
              success: function(data){
                $("#id").val(data.id);
             $("#se_day").val(data.se_day);
             $("#strat_time").val(data.strat_time);
             $("#end_time").val(data.end_time);
             if (data.status =='active') {
              $("input[name='status'][value='active']").prop('checked', true);
             }
             else
             {
               $("input[name='status'][value='inactive']").prop('checked', true);
             }
   
               }

              
            });

        
  });
  </script>

    <script>
    function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
@endpush