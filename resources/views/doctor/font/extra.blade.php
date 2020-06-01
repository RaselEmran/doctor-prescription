@extends('welcome')
@section('title','header|footer')
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
                          <h3>Header Footer</h3>
                        </div>
                            <form method="POST" action="{{route('admin.fontpage.extra-form')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                            <div class="modal-body">
                              

                          <label>Facebook Link </label>
                          <div class="form-group">
                            <input type="text" class="form-control" name="fb_link" value="{{$extra->fb_link}}">
                          
                          </div>

                           <label for="">twiter Link</label>
                          <div class="form-group">
                          <input type="text" name="twiter_link" class="form-control" value="{{$extra->twiter_link}}" >
                          </div>

                           <label for="">Google Plus</label>
                          <div class="form-group">
                          <input type="text" name="google_plus" class="form-control" value="{{$extra->google_plus}}">
                          </div>

                           <label for="">Email</label>
                          <div class="form-group">
                          <input type="text" name="email" class="form-control" value="{{$extra->email}}">
                          </div>

                           <label for="">Mobile</label>
                          <div class="form-group">
                           <input type="text" name="mobile" class="form-control" value="{{$extra->mobile}}">
                          </div>
                           <label for="">Contact Info</label>
                          <div class="form-group">
                           <input type="text" name="contact" class="form-control" value="{{$extra->contact}}">
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