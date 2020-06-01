@extends('welcome')
@section('title','doctor:online-appointment')
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
          <div class="card-header" style="background: #5A9599;color: #fff">
            <h3>Online Appointment</h3>

          </div>
                           <div style="margin-top: 25px">
                                 <button type="button" class="btn btn-success margin-5" data-toggle="modal" data-target="#Modal1">
                                 Online Appointment List
                                </button>
                         
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
                                                <th>Apponit Day</th>

                                                <th>Serial</th>
                                                <th>Appoint By</th>
                                                <th>Pay Status</th>
                                                <th>Appoint Status</th>
                                                <th>Print</th>
                                                <th>Confirm</th>

                                            
                                            </tr>
                                        </thead>
                                          @foreach($app as $all)
                                          <tr>
                                            <td>{{$all->pat_f_name}}</td>
                                            <td>{{$all->pa_id}}</td>
                                            <td>{{$all->ap_mobile}}</td>
                                            <td>{{$all->ap_date}}</td>
                                            <td><?php echo date('D',strtotime($all->ap_date)).' day' ?></td>

                                            <td>{{$all->serial_no}}</td>
                                            <td>{{$all->appointed_by}}</td>
                                            <td>
                                              @if($all->payment_status=='paid')
                                              <span class="badge badge-pill badge-success">Paid</span>
                                              @else
                                              <span class="badge badge-pill badge-danger">UnPaid</span>
                                              @endif

                                            </td>
                                            <td>
                                               @if($all->ap_status=='pending')
                                              <span class="badge badge-pill badge-primary">pendding</span>
                                              @elseif($all->ap_status=='sending')
                                              <span class="badge badge-pill badge-primary">Sendding</span>
                                              @else
                                              <span class="badge badge-pill badge-info">Receive</span>
                                              @endif
                                            </td>

                                            <td>
                                               <a href="" class="btn btn-primary margin-5 edit-ap" data-toggle="modal" data-target="#editm"  ap_id="{{$all->id}}">Print</a>
                                             
                                            </td>
                                            <td>
                                               <a href="{{route('user.appointment.perseprint',$all->id)}}" class="btn btn-danger margin-5 prev-id">Confirm</a>
                                             
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
                                                <th>Apponit Day</th>

                                                <th>Serial</th>
                                                <th>Appoint By</th>
                                                <th>Pay Status</th>
                                                <th>Appoint Status</th>
                                                <th>Print</th>
                                                <th>Confirm</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                    </div>
                                </div>

                              </div>
                        </div>
           </div>

{{--  --}}

<div class="row"> 
   <div class="col-md-12">
         <div class="card">
          <div class="card-header" style="background: #5A9599;color: #fff">
            <h3>Online Receiving Appointment</h3>

          </div>
                           <div style="margin-top: 25px">
                                 <button type="button" class="btn btn-success margin-5" data-toggle="modal" data-target="#Modal1">
                                 Online Receiving Appointment List
                                </button>
                         
                                </button>
                         
                           </div>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="p-20">
                                  <div class="table-responsive">
                                    <table id="myTable1" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>ID</th>
                                                <th>Mobile</th>
                                                <th>Apponit Date</th>
                                                <th>Apponit Day</th>

                                                <th>Serial</th>
                                                <th>Appoint By</th>
                                                <th>Pay Status</th>
                                                <th>Appoint Status</th>
                                                <th>Print</th>
                                       

                                            
                                            </tr>
                                        </thead>
                                          @foreach($app1 as $all)
                                          <tr>
                                            <td>{{$all->pat_f_name}}</td>
                                            <td>{{$all->pa_id}}</td>
                                            <td>{{$all->ap_mobile}}</td>
                                            <td>{{$all->ap_date}}</td>
                                            <td><?php echo date('D',strtotime($all->ap_date)).' day' ?></td>

                                            <td>{{$all->serial_no}}</td>
                                            <td>{{$all->appointed_by}}</td>
                                            <td>
                                              @if($all->payment_status=='paid')
                                              <span class="badge badge-pill badge-success">Paid</span>
                                              @else
                                              <span class="badge badge-pill badge-danger">UnPaid</span>
                                              @endif

                                            </td>
                                            <td>
                                               @if($all->ap_status=='pending')
                                              <span class="badge badge-pill badge-primary">pendding</span>
                                              @elseif($all->ap_status=='sending')
                                              <span class="badge badge-pill badge-primary">Sendding</span>
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
                                                <th>Apponit Day</th>

                                                <th>Serial</th>
                                                <th>Appoint By</th>
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


<!-- edit -->

      <div class="modal fade" id="editm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #5A9599;color: #fff">
                    <h3 class="modal-title" id="exampleModalLabel">Appointment Print Copy</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

          <!--  -->
     <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header" style="background: #5A9599;color: #fff">
                  <h3 class="modal-title" id="exampleModalLabel">Appointment Print Copy</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body" style="border: 1px dotted" id="div1">
                <table class="table">
                  <tr>
                    <td>Patient Name</td>
                    <td><span id="oldname"></span></td>
                  </tr>
                   <tr>
                    <td>Patient Prob</td>
                    <td><span id="oldprob"></span></td>
                  </tr>
                   <tr>
                    <td>atient Moba</td>
                    <td><span id="oldmob"></span></td>
                  </tr>
                   <tr>
                    <td>Appointment Date</td>
                    <td><span id="olddate"></span></td>
                  </tr>
                   <tr>
                    <td>Doctor Fee</td>
                    <td><span id="oldfee"></span></td>
                  </tr>
                   <tr>
                    <td>Serial Number</td>
                    <td><span id="oldserial"></span></td>
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
{{--  --}}
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
     <script src="{{asset('backend/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('backend/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script> 
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

        $('#myTable1').DataTable( {
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

    $(".edit-oap").click(function(){
    var oap_id =$(this).attr('oap_id');

 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/newapoint/oldprint')}}",
              data : {oap_id:oap_id},
              dateType: 'json',
              success: function(data){
                 $("#oldname").text(data.pat_f_name);
                 $("#oldprob").text(data.problem);
                 $("#oldmob").text(data.ap_mobile);
                 $("#olddate").text(data.ap_date);
                 $("#oldfee").text(data.doc_fee);
                 $("#oldserial").text(data.serial_no);

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
</script>
@endpush