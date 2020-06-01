@extends('welcome')
@section('title','slider')
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
                                  Slider List
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3" style="float: right;">
                                    Add New Slider
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
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                          @foreach($alls as $all)
                                          <tr>
                                            <td>{{$all->title}}</td>
                                            <td>{{$all->sub_title}}</td>
                                            <td><img src="{{asset($all->image)}}" alt="" width="120px"></td>
                                            <td>
                                              @if($all->status =='yes')
                                              <a href="{{route('admin.slider.active',$all->id)}}" class="btn btn-primary">Active</a>
                                              @else
                                              <a href="{{route('admin.slider.inactive',$all->id)}}" class="btn btn-danger">Inactive</a>
                                              @endif
                                            </td>
                                        
                                            <td>
                                               <a href="" class="btn btn-primary margin-5 edit-sld" data-toggle="modal" data-target="#editm"  sld_id="{{$all->id}}">Edit</a>
                                            </td>

                                          </tr>


                                          @endforeach
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Image</th>
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
                                          <h3 class="modal-title" id="exampleModalLabel">Add New Slider </h3>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                          <div class="modal-body">
                             <form method="POST" action="{{route('admin.slider.slider-store')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                           <label for="">Title</label>
                          <div class="form-group">
                          <input type="text" name="title" class="form-control" >
                          </div>

                         <label for="">Title</label>
                          <div class="form-group">
                          <input type="text" name="sub_title" class="form-control" >
                          </div>
                         
                          <div class="form-group">
                           <label for="">Image</label>
                            <input type="file" name="image">

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
                                                <h3 class="modal-title" id="exampleModalLabel">Update Slider </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                      <form method="POST" action="{{route('admin.slider.sld-update')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Title </label>
                          <div class="form-group">
                            <input type="text" id="title" class="form-control" name="title" value="">
                             <input type="hidden" class="form-control" name="id" id="id" value="">
                          </div>
                           <label> Sub Title</label>
                          <div class="form-group">
                            <input type="text" id="sub_title" class="form-control" name="sub_title" value="">
                          
                          </div>
                          <div class="row">
                            <div class="col-md0-6">
                          <label for="">Image</label>
                          <div class="form-group">
                            <input type="file" name="fle"  class="form-control">
                           </div>
                            </div>
                            <div class="col-md0-6">
                                 <img id="output_image1"/ style="width: 90px;height: 90px" src="" class="">
                            </div>
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

  $(".edit-sld").click(function(){
    var sld_id =$(this).attr('sld_id');
   
 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/slider/slideredit')}}",
              data : {sld_id:sld_id},
              dateType: 'json',
              success: function(data){
                $("#id").val(data.id);
                $("#title").val(data.title);
                $("#sub_title").val(data.sub_title);
                $("#output_image1").attr("src",'/'+
                    data.image);

              console.log(data);
   
               }

              
            });

        
  });
  </script>
@endpush