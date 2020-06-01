@extends('welcome')
@section('title','Taking|apoint')
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
                                  Taking Apointment List
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
                                                <th>History</th>

                                            
                                             </tr>
                                        </thead>
                                     @foreach ($app as $all)
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
                                               <a href="" class="btn btn-danger margin-5 prev-id"  data-toggle="modal" data-target="#Modal3" sd_id="{{$all->pa_id}}" >Prescribe</a>
                                             
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
                                                <th>History</th>

                                            
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
                                                <h3 class="modal-title" id="exampleModalLabel">Patient Case history </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modal_show">
                   
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

    $(".prev-id").click(function(){
      var prev_id =$(this).attr('sd_id');
  

          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/press/prevous')}}",
              data : {prev_id:prev_id},
              dateType: 'text',
              success: function(data){
              console.log(data);
              if (data) {
              $("#modal_show").html(data);
              $('#Modal3').modal('show')
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