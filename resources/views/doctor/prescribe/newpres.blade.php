@extends('welcome')
@section('title','genarate-prescribe')
@push('css')
   <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{asset('/backend/assets/libs/select2/dist/css/select2.min.css')}}">
    <!-- <link href="{{asset('backend/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet"> -->
@endpush

@section('content')

<div class="row" style="padding: 10px;margin-left: 25px ">
   <div class="card">
          <div class="card-header" style="background: #5A9599;color: #fff">
            <h3>New Patient Appointment</h3>
              <div class="form-group" style="display: none" id="input_show">
                <table class="table">
                  <tr>
                    <td>
                     
                      <input type="text" id="prev_id" class="form-control" placeholder="Apointment ID:" >
                    </td>
                    <td>
                      <input type="button" class="btn btn-danger" id="close" value="Close">
                    </td>
                  </tr>
                </table>
    
      
          </div>
       <button type="button" class="btn btn-primary" id="prev" style="float: right;">Prevous Case</button>
      </div>

<div class="row">
  <div class="col-md-6">
  
      <table class="table">
    <thead>
      <tr>
        <td>Case History</td>
        <th>Action</th>
      </tr>
    </thead>
<tbody>
 <tr>
     <td>
        <textarea id="casetype" class="form-control no-resize" placeholder="Case Study"></textarea>
     </td>
     <td>
       <button class="btn btn-info" id="addcase">Add Case</button> 
     </td>
 </tr>
</tbody>
  </table>
  </div>
  <div class="col-md-6">
      <table class="table">
    <thead>
      <tr>
       <th>Diagonoisis</th>
        <th>Action</th>
      </tr>
    </thead>
<tbody>
 <tr>
     <td>
        <input type="text" id="dia" class="form-control" placeholder="Test name">
     </td>
        <td>
        <button class="btn btn-info" id="addnew">Add Test</button>
      </td>
 </tr>
</tbody>
  </table>
  </div>
</div>        

<div class="row">
  <div class="col-md-12">
      <table class="table">
     <thead>
      <tr>
         <th>Medicine Name</th>
         <th>Medicine Type</th>
         <th>Quantity</th>
         <th>Instruction</th>
         <th>Meal</th>
         <th>Duration</th>
      </tr>
    </thead>
    <tbody>
     <tr>
      @php
        $medi =DB::table('medicines')->get();
      @endphp
         <td>
          <select class="select2 form-control m-t-15" id="medicine_name">
           <option value="">Select Medicine</option>
           @foreach ($medi as $element)
             <option value="{{$element->medi_name}}">{{$element->medi_name}}</option>
           @endforeach
           </select> 
        </td>
        <td>
          <select  id="medicine_type"  class="form-control show-tick" data-live-search="true" required="">
            <option value="">Select medicine type</option>
            <option value="Tablet">Tablet</option>
            <option value="Liquid">Liquid</option>
            <option value="Capsules">Capsules</option>
            <option value="Drops">Drops</option>
            <option value="Injections">Injections</option>
          </select>
        </td>
       <td>
         <input type="text" name="medicine_qty" id="medicine_qty" class="form-control">
     </td>
       <td>
            <select  id="instruction"  class="form-control show-tick" data-live-search="true" required="">
            <option value="">Select Days type</option>
            <option value="1-1-1">1-1-1</option>
            <option value="1-0-1">1-0-1</option>
            <option value="1-1-0">1-1-0</option>
            <option value="0-1-1">0-1-1</option>
            <option value="0-0-1">0-0-1</option>
            <option value="1-0-0">1-0-0</option>
            <option value="0-1-0">0-1-0</option>
            </select>
        </td>
        <td>
           <select  id="meal"  class="form-control" data-live-search="true" required="">
              <option value="">Select meal</option>
              <option value="খাবারের আগে">খাবারের আগে</option>
              <option value="খাবারের পরে">খাবারের পরে</option>
          </select>
        </td>
        <td>
          <input type="text" id="days" class="form-control">
        </td>
        <td>
          <button class="btn btn-danger" id="addrow">Add Medi</button>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
  <div style="background: #45C203;text-align: center;">
  <h2 style="">Prescription Details</h2>
    
  </div>
<div class="row">

  <div class="col-md-12" style="padding: 8px">
    <form action="{{route('admin.prescribe.newpesstore',[$pid,$id])}}" method="post">
{{@csrf_field()}}
  <table class="table" style="padding: 7px ;border: 1px solid ;display: none" id="caseshow">
  <thead style="background: #087852;color: #fff;font-size: 18px">
    <tr>
      <td>Case Name:</td>
      <td>Cancel</td>
    </tr>
  </thead>
  <tbody id="case_table">
  
   </tbody>    
 </table>
  <table class="table" style="padding: 7px ;border: 1px solid;display: none" id="testshow">
  <thead style="background: #087852;color: #fff;font-size: 18px">
<tr>
    <td>Test Name:</td>
    <td>Cancel</td>
</tr>
  </thead>
  <tbody id="dia_table">
  
   </tbody>    
 </table>
 <table class="table" style="padding: 7px ;border: 1px solid ;display: none" id="medishow">
    <thead style="background: #087852;color: #fff;font-size: 18px">
       <tr>
        <th>Medicine name</th>
        <th>Medicine Type</th>
        <th>Quantity</th>
        <th>Inistruction</th>
        <th>Take</th>
        <th>Days</th>
        <th>Cancel</th>
       </tr>
  
   </thead>
  <tbody id="medi_table">
  
  </tbody>    
</table>

<button type="submit" class="btn btn-info">Genarate Prescribe</button>
    </form>
  </div>
</div>
 </div>
 </div>

<div class="modal fade" id="Mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="background: #5A9599;color: #fff">
          <h3 class="modal-title" id="exampleModalLabel">Patient Prevoius Case Studys </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" id="modal_show">
       
      </div>   
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                               
      </div>
    </div>                                                                       
  </div>                                          
</div>



@endsection
@push('js')
 <script src="{{asset('/backend/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('/backend/assets/libs/select2/dist/js/select2.min.js')}}"></script>
  <!-- <script src="{{asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script> -->
  <script>
        $(".select2").select2();
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//
     @if(session('msg'))
        
                toastr.success('{{session('msg')}}');
     @endif
         @if(session('emsg'))
        
                toastr.error('{{session('emsg')}}');
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

<script>
    $("#addrow").on('click',function(){
 var name= $("#medicine_name").val();
 var qty= $("#medicine_qty").val();
 var ins= $("#instruction").val();
 var meal= $("#meal").val();
 var days= $("#days").val();
      if (name != '' && qty != '' && ins != '' && meal !='' && days !='') {
  var html = '';
  html += '<tr>';
  html += '<td><input type="hidden" name="medicine_name[]" value="'+$("#medicine_name").val()+'"/>'+$("#medicine_name").val()+'</td>';
   html += '<td><input type="hidden" name="medicine_type[]" value="'+$("#medicine_type").val()+'"/>'+$("#medicine_type").val()+'</td>';
  html += '<td><input type="hidden" name="medicine_qty[]" value="'+$("#medicine_qty").val()+'"/>'+$("#medicine_qty").val()+'</td>';
  html += '<td><input type="hidden" name="instruction[]" value="'+$("#instruction").val()+'"/>'+$("#instruction").val()+'</td>';
  html += '<td><input type="hidden" name="meal[]" value="'+$("#meal").val()+'"/>'+$("#meal").val()+'</td>';
  html += '<td><input type="hidden" name="days[]" value="'+$("#days").val()+'"/>'+$("#days").val()+'day</td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remmove"><span class="glyphicon glyphicon-minus">Cancel</span></button></td></tr>';
  $('#medi_table').append(html);
  $("#medishow").show();
  $("#medicine_name").val("");
  $("#medicine_qty").val("");
  $("#instruction").val("");
  $("#meal").val("");
  $("#days").val("");
  toastr.success('Medicine Information Add Successfully');

}
else
{
  toastr.error('All Field are Required');
}
  });
 $(document).on('click', '.remmove', function(){
  $(this).closest('tr').remove();
  toastr.success('Medicine Information Remove Successfully');

 });
    //
  $("#addcase").on('click',function(){
  var a=$("#casetype").val();
  if (a !='') {
  var html = '';
  html += '<tr>';
  html += '<td><input type="hidden" name="casename[]" value="'+$("#casetype").val()+'"/>'+$("#casetype").val()+'</td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remmovecase"><span class="glyphicon glyphicon-minus">Cencel</span></button></td></tr>';
  $('#case_table').append(html);

  $("#caseshow").show();
  $("#casetype").val("");
  toastr.success('Case Information Add Successfully');
 
}
else
{
  toastr.error('Case Field are Required');

}
  });
    $(document).on('click', '.remmovecase', function(){
  $(this).closest('tr').remove();
  toastr.success('Case Information Remove Successfully');



 });
    //

 $("#addnew").on('click',function(){
 var test=$("#dia").val();
 if (test !='') {
  var html = '';
  html += '<tr>';
  html += '<td><input type="hidden" name="dia[]" value="'+$("#dia").val()+'"/>'+$("#dia").val()+'</td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm tremmove"><span class="glyphicon glyphicon-minus">Cencel</span></button></td></tr>';
  $('#dia_table').append(html);
  $("#testshow").show();
  $("#dia").val("");

  toastr.success('Test Information Add Successfully');

}
else
{
  toastr.error('Test Field are Required');

}
  });
    $(document).on('click', '.tremmove', function(){
  $(this).closest('tr').remove();
  toastr.success('Test Information Remove Successfully');

 });
    // 

    $("#prev").click(function(){
     $("#input_show").show('1000');
    });
    $("#close").click(function(){
      $("#input_show").hide('1000');
      $("#prev_id").val('');
    });

    $("#prev_id").blur(function(){
      var prev_id =$("#prev_id").val();
  

          $.ajax({

              type: 'POST',
              url: "{{URL::to('/admin/press/prevous')}}",
              data : {prev_id:prev_id},
              dateType: 'text',
              success: function(data){
              console.log(data);
              if (data) {
              $("#modal_show").html(data);
              $('#Mymodal').modal('show')
              }
              else
              {
              $('#Mymodal').modal('hide')
                toastr.error('No Prevoius History');


              }
                             
               }
              
            });

    });
</script>
@endpush