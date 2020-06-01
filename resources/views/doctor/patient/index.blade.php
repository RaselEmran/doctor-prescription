@extends('welcome')
@section('title','Patient:list')
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
                                  Patient List
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3" style="float: right;">
                                    Add New Patient
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
                                                <th>Apoint Doctor</th>
                                                <th>Patient Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Birth Date</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                          @foreach($patient as $all)
                                          <tr>
                                            <td>{{$all->doctor_name}}</td>
                                            <td>{{$all->patient_name}}</td>
                                            <td>{{$all->phone}}</td>
                                            <td>
                                            {{$all->address}}
                                            </td>
                                            <td>{{$all->date_birth}}</td>
                                            <td>
                                               <a href="" class="btn btn-primary margin-5 edit-patient" data-toggle="modal" data-target="#editm"  patient_id="{{$all->id}}">Edit</a>
                                            </td>

                                          </tr>


                                          @endforeach
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Apoint Doctor</th>
                                                <th>Patient Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Birth Date</th>
                                                <th>Action</th>
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
                                                <h3 class="modal-title" id="exampleModalLabel">Add New Patient </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="alert alert-danger" style="display:none"></div>
                             <form method="POST" action="{{ URL::to('admin/patient/store') }}" id="addForm">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor name </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="doctor_name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden" class="form-control" name="doctor_id"  value="<?php echo Session::get('doctor_id') ?>">
                          </div>
                           <label> Full Name</label>
                          <div class="form-group">
                           <input type="text" name="patient_name" class="form-control" >
                          </div>
                           <label for="">Email*</label>
                          <div class="form-group">
                          <input type="email" name="email"  class="form-control" >
                          </div>

                          <label for="">Phone</label>
                          <div class="form-group">
                            <input type="text" name="phone"  class="form-control">
                           </div>

                          <label for="">Address</label>
                            <div class="form-group">
                            <input type="text" name="address"  class="form-control">
                           </div>
                         
                          <div class="form-group">
                           <label for="">Sex</label>
                            <input name="sex" type="radio"  class="with-gap radio-col-purple" value="male"  />
                            <label for="radio_32">Male</label>
                            <input name="sex" type="radio" id="radio_33" class="with-gap radio-col-deep-purple" value="female"  />
                            <label for="radio_33">Female</label>

                        </div>
                          <label for="">Date of Birth</label>
                          <div class="form-group">
                            <input type="text" name="date_birth" id="date" class="form-control date_birth"   placeholder="yyyy-mm-dd">
                        </div>
                       

                              <label> Blood Group</label>
                          <div class="form-group">
                             <select class=" form-control custom-select" name="blood"  style="width: 100%; height:36px;">
                                 <option value="">Select one</option>
                                  <option value="A+">A(+)</option>
                                  <option value="A-">A(-)</option>
                                  <option value="AB+">AB(+)</option>
                                  <option value="AB-">AB(-)</option>
                                  <option value="O+">O(+)</option>
                                  <option value="O-">O(-)</option>
                                  <option value="B+">B(+)</option>
                                  <option value="B-">B(-)</option>

                             </select>
                          </div>
                            <label for="">Problem</label>
                            <div class="form-group">
                            <input type="text" name="problem"  class="form-control">
                           </div>
                    
                          
                         
                          <button class="btn btn-danger" type="reset" data-dismiss="modal" >Cancel</button>
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
                                                <h3 class="modal-title" id="exampleModalLabel">Update Patient Information </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                      <form method="POST" action="{{route('admin.patient.update')}}" id="editForm">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor name </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="doctor_name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden" class="form-control" name="id" id="id" value="">
                          </div>
                           <label> Full Name</label>
                          <div class="form-group">
                           <input type="text" name="patient_name" id="patient_name" class="form-control" >
                          </div>
                           <label for="">Email*</label>
                          <div class="form-group">
                          <input type="email" name="email" id="email" class="form-control" >
                          </div>

                          <label for="">Phone</label>
                          <div class="form-group">
                            <input type="text" name="phone" id="phone" class="form-control">
                           </div>

                          <label for="">Address</label>
                            <div class="form-group">
                            <input type="text" name="address" id="address" class="form-control">
                           </div>
                         
                          <div class="form-group">
                           <label for="">Sex</label>
                            <input name="sex" type="radio" id="radio_32" class="with-gap radio-col-purple" value="male"  />
                            <label for="radio_32">Male</label>
                            <input name="sex" type="radio" id="radio_33" class="with-gap radio-col-deep-purple" value="female"  />
                            <label for="radio_33">Female</label>

                        </div>
                          <label for="">Date of Birth</label>
                          <div class="form-group">
                            <input type="text" name="date_birth" class="form-control date_birth" id="date_birth"  placeholder="yyyy-mm-dd">
                        </div>
                        

                         

                              <label> Blood Group</label>
                          <div class="form-group">
                             <select class=" form-control custom-select" name="blood" id="blood" style="width: 100%; height:36px;">
                                 <option value="">Select one</option>
                                  <option value="A+">A(+)</option>
                                  <option value="A-">A(-)</option>
                                  <option value="AB+">AB(+)</option>
                                  <option value="AB-">AB(-)</option>
                                  <option value="O+">O(+)</option>
                                  <option value="O-">O(-)</option>
                                  <option value="B+">B(+)</option>
                                  <option value="B-">B(-)</option>

                             </select>
                          </div>
                            <label for="">Problem</label>
                            <div class="form-group">
                            <input type="text" name="problem" id="problem" class="form-control">
                           </div>
                    
                          
                         
                          <button class="btn btn-danger" type="reset" data-dismiss="modal" >Cancel</button>
                          <button class="btn btn-primary" type="submit">Update</button>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
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
       var date = new Date();
         date.setDate(date.getDate());
        jQuery('#date_birth').datepicker({
            format: 'yyyy-mm-dd',
            // startDate: '-3d',
            autoclose: true,
            startDate: date,
            todayHighlight: true
        });

         var date = new Date();
         date.setDate(date.getDate());
        jQuery('#date').datepicker({
            format: 'yyyy-mm-dd',
            // startDate: '-3d',
            autoclose: true,
            startDate: date,
            todayHighlight: true
        });

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
              
                toastr.success(data.success);
                setTimeout(function(){// wait for 5 secs(2)
                 location.reload(); // then reload the page.(3)
                }, 5000); 
              }

               }              
            });
 });

// Edit.........
  $(".edit-patient").click(function(){
    var patient_id =$(this).attr('patient_id');
   
 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/patient/edit')}}",
              data : {patient_id:patient_id},
              dateType: 'json',
              success: function(data){
               
                $("#id").val(data.id);
             $("#patient_name").val(data.patient_name);
             $("#email").val(data.email);
             $("#phone").val(data.phone);
             $("#address").val(data.address);
             $("#date_birth").val(data.date_birth);
             $("#blood").val(data.blood);
             $("#problem").val(data.problem);


             if (data.sex =='male') {
              $("input[name='sex'][value='male']").prop('checked', true);
             }
             else
             {
               $("input[name='sex'][value='female']").prop('checked', true);
             }
   
               }
              
            });       
  });

  // update
  $('#editForm').on('submit', function(e){
   
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