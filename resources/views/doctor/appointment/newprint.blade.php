@extends('welcome')
@section('title','appoint-pay-slip')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')

<div class="row" style="padding:80px 0px ">
 @if(isset($_GET['last_id']))
<?php 
 $last_id =$_GET['last_id'];
 $print=DB::table('appointments')->where('id',$last_id)->first();

 ?>
	@if($print)
    <div class="col-md-8" style="width: 80%;margin: auto; padding-top: 20px;background: #5B9599" >
    	
                      <div class="card" id="div1">
                        <div style="border: 1px dotted;padding: 50px">
                        	<div style="background: #5A9599;color: #fff;text-align: center;">
                        		<h2>Appointment Pay Slip</h2>
                        	</div>
                        	<div class="row">
                        		<div class="col-md-6">
                        			<p>Patient Name: <u>{{$print->pat_f_name}}</u></p>
                        			<p>Patient Prob: <u>{{$print->problem}}</u></p>
                        			<p>Patient Moba: <u>{{$print->ap_mobile}}</u></p>

                        		</div>
                        		<div class="col-md-6">
                        			<p>Appointment Date: <u>{{$print->ap_date}}</u></p>
                        			<p>Doctor Fee: <b>{{$print->doc_fee}}</b></p>
                        			<p>Serial Number: <b>{{$print->serial_no}}</b></p>
                        		</div>
                        	</div>
                        </div>
                        </div>
                    <div class="text-right">
        <button class="btn btn-danger"onclick="printContent('div1')" type="button">Print </button>
    </div>       
    </div>
 
    @endif  
    @endif

 @if(isset($_GET['oldlast_id']))
<?php 
 $oldlast_id =$_GET['oldlast_id'];
 $oldprint=DB::table('old_apoints')->where('id',$oldlast_id)->first();

 ?>
  @if($oldprint)
    <div class="col-md-8" style="width: 80%;margin: auto; padding-top: 20px;background: #5B9599" >
      
                      <div class="card" id="div1">
                        <div style="border: 1px dotted;padding: 50px">
                          <div style="background: #5A9599;color: #fff;text-align: center;">
                            <h2>Appointment Pay Slip</h2>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <p>Patient Name: <u>{{$oldprint->pat_f_name}}</u></p>
                              <p>Patient Prob: <u>{{$oldprint->problem}}</u></p>
                              <p>Patient Moba: <u>{{$oldprint->ap_mobile}}</u></p>

                            </div>
                            <div class="col-md-6">
                              <p>Appointment Date: <u>{{$oldprint->ap_date}}</u></p>
                              <p>Doctor Fee: <b>{{$oldprint->doc_fee}}</b></p>
                              <p>Serial Number: <b>{{$oldprint->serial_no}}</b></p>
                            </div>
                          </div>
                        </div>
                        </div>
                    <div class="text-right">
        <button class="btn btn-danger"onclick="printContent('div1')" type="button">Print </button>
    </div>       
    </div>
 
    @endif  
    @endif
</div>

@endsection
@push('js')
  <!-- <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script> -->
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
	  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
@endpush