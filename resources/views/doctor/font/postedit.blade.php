@extends('welcome')
@section('title','update-post')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
       <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/select2/dist/css/select2.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row">
    <div class="col-md-10" style="width: 95%;margin: auto; padding-top: 20px">
                      <div class="card">
                        <div class="card-header" style="background: #5A9599;color: #fff">
                          <h3>Update Blog Post</h3>
                         
                        </div>
                     <form method="post" action="{{route('admin.fontpage.blog-update',$post->id)}}" enctype="multipart/form-data">
                      {{@csrf_field()}}
                       <div class="modal-body">
                        <label>Post By </label>
                          <div class="form-group">
                            <input type="text"  class="form-control" name="doctor_name" value="<?php echo Session::get('doctor_name')?>" readonly>
                             <input type="hidden"  class="form-control" name="doctor_id" value="<?php echo Session::get('doctor_id')?>">
                          </div>

                           <label>Post Title </label>
                            <div class="form-group">
                               <input type="text"  class="form-control" name="title" value="{{$post->title}}"/>
                             </div> 
                              <label>Bannar Image </label>
                          <div class="row">
                            <div class="col-md-6">
                                 <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" >
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                              
                            </div>
                            </div>
                            <div class="col-md-6">
                              <img src="{{asset($post->image)}}" alt="" width="180px">
                            </div>
                          </div>
                            <label for="">Post Body</label>
                            <div class="form-group">
                            <textarea name="body" class="ckeditor" >{{$post->body}}</textarea>
                            </div>
                             <label for="">Tag</label>
                            <div class="row">
                              <div class="col-md-8">
                                @php
                                  $tag =DB::table('tags')->orderBy('id','desc')->get();
                                @endphp
                                 <select class="select2 form-control m-t-15" multiple="multiple" name="tag_id[]" style="height: 36px;width: 100%;">

                                  @foreach ($tag as $element)
                                   <option
                                    @foreach($tags as $posttag)
                                          {{$posttag->tag_id == $element->id ? 'selected' : ''}}
                                     @endforeach
                                    value="{{$element->id}}">{{$element->name}}</option>
                                  @endforeach
                                 </select>
                              </div>
                              <div class="col-md-4">
                                <button type="button" class="btn btn-info margin-5" data-toggle="modal" data-target="#Modal3">
                                    New Tag
                                </button>
                              </div>
                            </div>

                            <label for="">Status</label>
                            <div class="form-group">
                              <select class="form-control m-t-15" name="status" style="height: 36px;width: 100%;">
                                <option {{$post->status == 'active' ? 'selected' : ''}} value="active">Active</option>
                                <option {{$post->status == 'inactive' ? 'selected' : ''}} value="inactive">Inactive</option>

                              </select>
                            </div>
                             <button class="btn btn-danger" type="reset" >Cancel</button>
                          <button class="btn btn-primary" type="submit">Update</button>
                          </div>

                     </form>
                 </div>
                       
    </div>
</div>


               <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: #5A9599;color: #fff">
                                                <h3 class="modal-title" id="exampleModalLabel">Add New Tag </h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                             <form method="POST" action="{{route('admin.fontpage.tagstore')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Tag name </label>
                          <div class="form-group">
                            <input type="text" id="email_address" class="form-control" name="name">
                           
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
 <script src="{{asset('/backend/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/backend/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/backend/assets/js/ckeditor/ckeditor.js')}}"></script>
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


  
  </script>
@endpush