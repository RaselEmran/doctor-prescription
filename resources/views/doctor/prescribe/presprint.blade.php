@extends('welcome')
@section('title','appoint-pay-slip')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('css/print.css')}}" media = "print">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
    <style>
      #div1{
        font-size: 20px;
      }
    </style>
@endpush

@section('content')

 @if(isset($_GET['apointment']))
 @php
   $ap =$_GET['apointment'];
   $info =DB::table('appointments')->where('pa_id',$ap)->first();
$doc_id =$info->doctor_id;
 @endphp
   <section style="background: #fff;width: 95%;margin: auto;padding: 25px" class="card">
   <div class="container pt-5 " id="div1">
              
<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">Name : {{$info->pat_f_name}} </th>
      <th scope="col">Age : {{$info->age}}</th>
      <th scope="col">Sex : {{$info->gender}} </th>
      <th scope="col">Date : {{$info->ap_date}}</th>
      <th scope="col">ID : {{$info->pa_id}}</th>
    </tr>
  </thead>
</table>
  
  <div class="row">
      <div class="col-md-3">
        @php
          $date=date('m-d-Y');
        $case =DB::table('case_studies')->where('pa_id',$ap)->where('date',$date)->get();
        @endphp
         <p class="text-uppercase text-light bg-info p-1 font-weight-bold"> Problem</p>
          <ul class="px-4" style="list-style:square"> 
             @foreach($case as $allcase)
             <li>{{$allcase->casename}}</li>
             
              @endforeach
          </ul>
         
           <p class="text-uppercase text-light bg-info p-1 font-weight-bold"> Lab Test</p>
         @php
           $date=date('m-d-Y');
           $test =DB::table('case_tests')->where('pa_id',$ap)->where('date',$date)->get();
         @endphp
          <ul class="px-4" style="list-style: square"> 
              @foreach($test as $alltest)
              <li> {{$alltest->dia}}</li>
              @endforeach
        
          </ul>
      </div>
       
      <div class="col-md-9">
         <div class=" pl-5   border border-info  border-top-0 border-right-0  border-bottom-0"> 
          <p class="text-uppercase text-light bg-info p-1 font-weight-bold"> medicine</p>
          @php
            $date=date('m-d-Y');
$medi =DB::table('case_medis')->where('pa_id',$ap)->where('date',$date)->get();
          @endphp
            <table class="table">
                                <thead>
                                  <tr>
                                    <td>Medicine Name</td>
                                    <td>Medicine Type</td>
                                    <td>Medicine Qty</td>
                                    <td>Medicine Taking</td>
                                    <td>Instruction</td>
                                    <td>Duration</td>
            
                                  </tr>
                                </thead>
                              
                               <tbody>
                                @foreach($medi as $allmedi)
                                <tr>
                                  <td>{{$allmedi->medicine_name}}</td>
                                   <td>{{$allmedi->medicine_type}}</td>
                                  <td>{{$allmedi->medicine_qty}}</td>
                                  <td>{{$allmedi->instruction}}</td>
                                  <td>{{$allmedi->meal}}</td>
                                  <td>{{$allmedi->days}} দিন</td>

                                </tr>
                                @endforeach
                               </tbody>
                              
                          </table>
          </div>
      </div>
  </div>
   </div>

     <div class="text-right">
        <button class="btn btn-danger"onclick="printContent('div1')" type="button">Print </button>
    </div>  
   </section>
@endif


 @if(isset($_GET['oldlast_id']))
 @php
   $ap =$_GET['oldlast_id'];
   $info =DB::table('old_apoints')->where('pa_id',$ap)->first();
$doc_id =$info->doctor_id;
 @endphp
   <section style="background: #fff;width: 95%;margin: auto;" class="card">
   <div class="container pt-5 " id="div1">
              
<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">Name : {{$info->pat_f_name}} </th>
      <th scope="col">Age : {{$info->age}}</th>
      <th scope="col">Sex : {{$info->gender}} </th>
      <th scope="col">Date : {{$info->ap_date}}</th>
      <th scope="col">ID : {{$info->pa_id}}</th>
    </tr>
  </thead>
</table>
  
  <div class="row">
      <div class="col-md-4">
        @php
          $date=date('m-d-Y');
        $case =DB::table('case_studies')->where('pa_id',$ap)->where('date',$date)->get();
        @endphp
         <p class="text-uppercase text-light bg-info p-1 font-weight-bold"> Problem</p>
          <ul class="px-4" style="list-style:square"> 
             @foreach($case as $allcase)
             <li>{{$allcase->casename}}</li>
             
              @endforeach
          </ul>
         
           <p class="text-uppercase text-light bg-info p-1 font-weight-bold"> Lab Test</p>
         @php
           $date=date('m-d-Y');
           $test =DB::table('case_tests')->where('pa_id',$ap)->where('date',$date)->get();
         @endphp
          <ul class="px-4" style="list-style: square"> 
              @foreach($test as $alltest)
              <li> {{$alltest->dia}}</li>
              @endforeach
        
          </ul>
      </div>
       
      <div class="col-md-8">
         <div class=" pl-5   border border-info  border-top-0 border-right-0  border-bottom-0"> 
          <p class="text-uppercase text-light bg-info p-1 font-weight-bold"> medicine</p>
          @php
            $date=date('m-d-Y');
$medi =DB::table('case_medis')->where('pa_id',$ap)->where('date',$date)->get();
          @endphp
            <table class="table">
                                <thead>
                                  <tr>
                                    <td>Medicine Name</td>
                                    <td>Medicine Qty</td>
                                    <td>Medicine Taking</td>
                                    <td>Instruction</td>
                                    <td>Taking meal</td>
            
                                  </tr>
                                </thead>
                              
                               <tbody>
                                @foreach($medi as $allmedi)
                                <tr>
                                  <td>{{$allmedi->medicine_name}}</td>
                                  <td>{{$allmedi->medicine_qty}}</td>
                                  <td>{{$allmedi->instruction}}</td>
                                  <td>{{$allmedi->meal}}</td>
                                  <td>{{$allmedi->days}}</td>

                                </tr>
                                @endforeach
                               </tbody>
                              
                          </table>
          </div>
      </div>
  </div>
   </div>

     <div class="text-right">
        <button class="btn btn-danger"onclick="printContent('div1')" type="button">Print </button>
    </div>  
   </section>
@endif

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