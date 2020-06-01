@extends('welcome')
@section('title','doctor:schedaule')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row"> 
   <div class="col-md-12">
         <div class="card">
                           <div style="margin-top: 25px">
                                 <button type="button" class="btn btn-success margin-5" data-toggle="modal" data-target="#Modal1">
                                  Schedaule List
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3" style="float: right;">
                                    Add New Schedaule
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
                                                <th>Day</th>
                                                <th>Strat Time</th>
                                                <th>End Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                          @foreach($alls as $all)
                                          <tr>
                                            <td>{{$all->se_day}}</td>
                                            <td>{{$all->strat_time}}</td>
                                            <td>{{$all->end_time}}</td>
                                            <td>
                                              @if($all->status =='active')
                                              <a href="" class="btn btn-info">Active</a>
                                              @else
                                               <a href="" class="btn btn-danger">Inactive</a>
                                              @endif
                                            </td>
                                            <td>
                                               <a href="" class="btn btn-primary margin-5 edit-sd" data-toggle="modal" data-target="#editm"  sd_id="{{$all->id}}">Edit</a>
                                            </td>

                                          </tr>


                                          @endforeach
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Day</th>
                                                <th>Strat Time</th>
                                                <th>End Time</th>
                                                <th>Status</th>
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
                                                <h3 class="modal-title" id="exampleModalLabel">Add New Scheduale </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                             <form method="POST" action="{{route('admin.schedule.store')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor name </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden" id="email_address" class="form-control" name="doctor_id" value="<?php echo Session::get('doctor_id')?>">
                          </div>
                           <label> Available Days</label>
                          <div class="form-group">
                             <select class=" form-control custom-select" name="se_day" style="width: 100%; height:36px;">
                                 <option value="">Select Days</option>
                                  <option value="Fri">Friday</option>
                                  <option value="Sat">Satarday</option>
                                  <option value="Sun">Sunday</option>
                                  <option value="Mon">Monday</option>
                                  <option value="Tue">Tuesday</option>
                                  <option value="Wed">Wednessday</option>
                                  <option value="Thu">Thusday</option>
                             </select>
                          </div>
                           <label for="">Start Time</label>
                          <div class="form-group">
                          <input type="time" name="strat_time" class="form-control" >
                          </div>

                          <label for="">End Time</label>
                          <div class="form-group">
                            <input type="time" name="end_time" class="form-control">
                           </div>
                         
                          <div class="form-group">
                           <label for="">Status</label>
                            <input name="status" type="radio" id="radio_32" class="with-gap radio-col-purple" value="active"  />
                            <label for="radio_32">Active</label>
                            <input name="status" type="radio" id="radio_33" class="with-gap radio-col-deep-purple" value="inactive"  />
                            <label for="radio_33">Inactive</label>

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
                      <form method="POST" action="{{route('admin.schedule.update')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor name </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden" class="form-control" name="id" id="id" value="">
                          </div>
                           <label> Available Days</label>
                          <div class="form-group">
                             <select class=" form-control custom-select" name="se_day" id="se_day" style="width: 100%; height:36px;">
                                 <option value="">Select Days</option>
                                  <option value="Fri">Friday</option>
                                  <option value="Sat">Satarday</option>
                                  <option value="Sun">Sunday</option>
                                  <option value="Mon">Monday</option>
                                  <option value="Tue">Tuesday</option>
                                  <option value="Wed">Wednessday</option>
                                  <option value="Thu">Thusday</option>
                             </select>
                          </div>
                           <label for="">Start Time</label>
                          <div class="form-group">
                          <input type="time" name="strat_time" id="strat_time" class="form-control" >
                          </div>

                          <label for="">End Time</label>
                          <div class="form-group">
                            <input type="time" name="end_time" id="end_time" class="form-control">
                           </div>
                         
                          <div class="form-group">
                           <label for="">Status</label>
                            <input name="status" type="radio" id="radio_32" class="with-gap radio-col-purple" value="active"  />
                            <label for="radio_32">Active</label>
                            <input name="status" type="radio" id="radio_33" class="with-gap radio-col-deep-purple" value="inactive"  />
                            <label for="radio_33">Inactive</label>

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

  $(".edit-sd").click(function(){
    var sd_id =$(this).attr('sd_id');
   
 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/scheduale/edit')}}",
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
@endpush