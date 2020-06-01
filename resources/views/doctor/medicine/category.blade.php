@extends('welcome')
@section('title','medicine|category')
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
                                  Medicine Category List
                                </button>
                         
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3" style="float: right;">
                                    Add Category
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
                                                <th>Serial</th>
                                                <th>Category Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                          @foreach($category as $all)
                                          <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>{{$all->name}}</td>
                                            <td>{{$all->description}}</td>
                                    
                                            </td>
                                            <td>
                                               <a href="" class="btn btn-primary margin-5 edit-cat" data-toggle="modal" data-target="#editm"  cat_id="{{$all->id}}">Edit</a>
                                               <a href=""  class="btn btn-danger margin-5 delete" data-delete_cat="{{$all->id}}">Delete</a>
                                            </td>

                                          </tr>


                                          @endforeach
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <th>Serial</th>
                                                <th>Category Name</th>
                                                <th>Description</th>
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
                                                <h3 class="modal-title" id="exampleModalLabel">Add New Category </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                             <form method="POST" action="{{route('admin.medicine.catstore')}}" id="addForm">
                           {{ csrf_field() }}
                            <div class="modal-body">
                           <label for="">Category Name</label>
                          <div class="form-group">
                          <input type="text" name="name" class="form-control" >
                          </div>

                          <label for="">Description</label>
                          <div class="form-group">
                            <input type="text" name="description" class="form-control">
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
                      <form method="POST" action="{{route('admin.medicine.upcatstore')}}" id="editForm">
                           {{ csrf_field() }}
                            <div class="modal-body">
                           <label for="">Category Name</label>
                          <div class="form-group">
                            <input type="hidden" name="id" id="id">
                          <input type="text" name="name" id="name" class="form-control" >
                          </div>

                          <label for="">Description</label>
                          <div class="form-group">
                            <input type="text" name="description" id="description" class="form-control">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
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
$(document).on('click', '.delete', function (e) {
    e.preventDefault();
    var id = $(this).data('delete_cat');

    Swal.fire({
          title: 'Are you sure?',
          text: "You want to delete this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
      $.ajax({
              type: "POST",
              url: "{{route('admin.category.delete')}}",
              data: {id:id},
              dataType:'json',
               success: function (data) {
       if (data.success) {
              let timerInterval
               Swal.fire({
                    title: 'Success',
                    text: "File Deleted!",
                    type: 'success',
                   timer: 2000,
              onClose: () => {
                location.reload()
              }
          })
  
        }
    }         
  });
  }
})
  
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
                }); 
              }

               }              
            });
 });

  $(".edit-cat").click(function(){
    var cat_id =$(this).attr('cat_id');
   
 
          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/category/catedit')}}",
              data : {cat_id:cat_id},
              dateType: 'json',
              success: function(data){
                $("#id").val(data.id);
                $("#name").val(data.name);
                $("#description").val(data.description);
   
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