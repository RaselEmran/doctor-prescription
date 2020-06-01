 
 <tr>
 	<td>
 		<select class=" form-control custom-select category_name" name="category_name[]">
 			@php
 			 $cat =DB::table('categories')->orderBy('id','desc')->get();

 			@endphp
 			<option value="">Select Category</option>
 			 @foreach ($cat as $element)
 			 <option value="{{$element->id}}">{{$element->name}}</option>
 			 @endforeach
 			
 		</select>
 	</td>
 	<td>
 		<input type="text" name="medi_name[]" class="form-control medi_name">
 	</td>
 	<td>
 		<input type="text" name="genaric_name[]" class="form-control genaric_name">
 		
 	</td>
 	<td><button class="btn btn-danger" id="delete">-</button></td></tr>
 </tr>