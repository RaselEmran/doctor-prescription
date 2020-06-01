@extends('welcome')
@section('title','doctor:perday')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endpush

@section('content')
<div class="row"> 
   <div class="col-md-12">
         <div class="card">
                           <div style="margin-top: 25px">
                                 <button type="button" class="btn btn-success margin-5" data-toggle="modal" data-target="#Modal1">
                                  Total List
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3" style="float: right;">
                                    Add Perday Patient
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
                                                <th>Place</th>
                                                <th>Address</th>

                                                <th>Total</th>
                                                <th>Date</th>
                                                <th>Day</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                          @foreach($total as $all)
                                          <tr>
                                            <td>{{$all->place}}</td>
                                            <td>{{$all->address}}</td>
                                            <td>{{$all->total}}</td>

                                            <td>{{$all->date}}</td>
                                            <td>{{$all->day}}</td>
                                          
                                            <td>
                                               <a href="" class="btn btn-primary margin-5 edit-sdper" data-toggle="modal" data-target="#editm"  sdper_id="{{$all->id}}">Edit</a>
                                              @if($all->cancel =='not')
                                               <a href="{{ route('admin.scheduale.cancel',$all->id) }}" class="btn btn-info">Cancel</a>
                                               @if($all->status =='active')
                                               <a href="{{ route('admin.scheduale.sc-active',$all->id) }}" class="btn btn-danger">Active</a>
                                               @else
                                               <a href="{{ route('admin.scheduale.sc-inactive',$all->id) }}" class="btn btn-warning">Inctive</a>
                                               @endif
                                              @endif
                                            </td>

                                          </tr>


                                          @endforeach
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Place</th>
                                                <th>Address</th>
                                               <th>Total</th>
                                                <th>Date</th>
                                                <th>Day</th>
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
                                                <h3 class="modal-title" id="exampleModalLabel">Add Total Scheduale Patient</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                             <form method="POST" action="{{route('admin.perday-patient.daystore')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor name </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden" id="doctor_id" class="form-control" name="doctor_id" value="<?php echo Session::get('doctor_id')?>">
                          </div>
                          <label for="">Place</label>
                          <div class="form-group">
                          <input type="text" name="place" id="" class="form-control" >
                          </div>

                          <label for="">Address</label>
                          <div class="form-group">
                          <input type="text" name="address" id="" class="form-control" >
                          </div>
                    

                           <label> Available Days</label>
                          <div class="form-group">
                             <select class=" form-control custom-select day"  name="day" style="width: 100%; height:36px;">
                              <?php 
                             $sc=DB::table('scheduales')->where('doctor_id',$id)->where('status','active')->get();
                               ?>
                                 <option value="">Select Days</option>
                                 @foreach($sc as $alsc)
                                  <option value="{{$alsc->se_day}}">{{$alsc->se_day}}day</option>
                                  @endforeach
                                 
                             </select>
                          </div>

                            <label for="">Strat Time</label>
                          <div class="form-group">
                          <input type="time" name="strat_time" id="" class="form-control strat_time" readonly >
                          </div>

                            <label for="">End Time</label>
                          <div class="form-group">
                          <input type="time" name="end_time" id="" class="form-control end_time" readonly >
                          </div>
                           <label for="">date</label>
                          <div class="form-group">
                          <input type="text" name="date" id="ap_date" class="form-control" >
                          </div>

                             <label for="">Total Patient</label>
                          <div class="form-group">
                          <input type="text" name="total" id="" class="form-control" >
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
                                                <h3 class="modal-title" id="exampleModalLabel">Update Scheduale Time Table </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                   <form method="POST" action="{{route('admin.perday-patient.dayupdate')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor name </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden" id="doctor_id" class="form-control" name="doctor_id" value="<?php echo Session::get('doctor_id')?>">
                             <input type="hidden" class="form-control" name="id" id="id" value="">

                          </div>
                             <label for="">Place</label>
                              <div class="form-group">
                              <input type="text" name="place" id="place" class="form-control" >
                              </div>

                              <label for="">Address</label>
                              <div class="form-group">
                              <input type="text" name="address" id="address" class="form-control" >
                              </div>
                           <label> Available Days</label>
                          <div class="form-group">
                              <select class=" form-control custom-select day" id="day" name="day"  style="width: 100%; height:36px;">
                              <?php 
                             $sc=DB::table('scheduales')->where('doctor_id',$id)->where('status','active')->get();
                               ?>
                                 <option value="">Select Days</option>
                                 @foreach($sc as $alsc)
                                  <option value="{{$alsc->se_day}}">{{$alsc->se_day}}day</option>
                                  @endforeach
                                 
                             </select>
                          </div>

                              <label for="">Strat Time</label>
                          <div class="form-group">
                          <input type="time" name="strat_time" id="strat_time" class="form-control strat_time" readonly >
                          </div>

                            <label for="">End Time</label>
                          <div class="form-group">
                          <input type="time" name="end_time" id="end_time" class="form-control end_time" readonly >

                           <label for="">date</label>
                          <div class="form-group">
                         <input type="text" name="date" id="date" class="form-control" >
                          </div>

                             <label for="">Total Patient</label>
                          <div class="form-group">
                          <input type="text" name="total" id="total" class="form-control" >
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
</script>

  <script>
      var date = new Date();
         date.setDate(date.getDate());
        jQuery('#date').datepicker({
            format: 'yyyy-mm-dd',
            // startDate: '-3d',
            autoclose: true,
            startDate: date,
            todayHighlight: true
        });
   
     @if(session('msg'))
        
                toastr.success('{{session('msg')}}');
             
     @endif

        @if(session('emsg'))
        
                toastr.error('{{session('emsg')}}');
             
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

  $(".edit-sdper").click(function(){
    var sdper_id =$(this).attr('sdper_id');

 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/scheduale/sperdayedit')}}",
              data : {sdper_id:sdper_id},
              dateType: 'json',
              success: function(data){
    
               $("#id").val(data.id);
               $("#place").val(data.place);
               $("#address").val(data.address);
               $("#strat_time").val(data.strat_time);
               $("#end_time").val(data.end_time);

               $(".day").val(data.day);
               $("#date").val(data.date);
               $("#total").val(data.total);

               }

              
            });

        
  });

    $(".day").change(function(){
    var day =$(".day").val();
    var doctor_id =$("#doctor_id").val();

          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/scheduale/showtime')}}",
              data : {day:day,doctor_id:doctor_id},
              dateType: 'json',
              success: function(data){
              $(".strat_time").val(data.strat_time);
               $(".end_time").val(data.end_time);


               }

              
            });

        
  });
  </script>
@endpush