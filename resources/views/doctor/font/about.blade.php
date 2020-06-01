@extends('welcome')
@section('title','About-us')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
       <link href="{{asset('backend/dist/css/datatable.css')}}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/select2/dist/css/select2.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')
<div class="row">
    <div class="col-md-8" style="width: 90%;margin: auto; padding-top: 20px">
                      <div class="card">
                        <div class="card-header" style="background: #5A9599;color: #fff">
                          <h3>About us</h3>
                        </div>
                            <form method="POST" action="{{route('admin.fontpage.about-form')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Doctor Full name </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="Full_Name" value="{{$aboutus->Full_Name}}">
                             <input type="hidden" class="form-control" name="doc_id" id="doc_id" value="<?php echo Session::get('doctor_id')?>">
                          </div>

                           <label for="">Specality</label>
                          <div class="form-group">
                          <input type="text" name="special" class="form-control" value="{{$aboutus->special}}" >
                          </div>

                           <label for="">Degree</label>
                          <div class="form-group">
                          <input type="text" name="degree" class="form-control" value="{{$aboutus->degree}}">
                          </div>

                           <label for="">Experience</label>
                          <div class="form-group">
                          <input type="text" name="experience" class="form-control" value="{{$aboutus->experience}}">
                          </div>

                           <label for="">About you</label>
                          <div class="form-group">
                        <textarea name="about" class="form-control">{{$aboutus->about}}</textarea>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                             <label for="">Image</label>
                          <div class="form-group">
                           <input type="file" name="image">
                          </div>
                            </div>
                            <div class="col-md-6">
                              @if ($aboutus->image)
                               <img src="{{asset($aboutus->image)}}" alt="{{$aboutus->image}}" width="180px">
                              @endif
                            </div>
                          </div>

                   
                         
                          <button class="btn btn-danger" type="reset" >Cancel</button>
                          <button class="btn btn-primary" type="submit">Update</button>
                          </div>
                        </form>
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


  
  </script>
@endpush