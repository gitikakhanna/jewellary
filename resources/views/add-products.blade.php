@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-3">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				  	<a class="nav-link active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">General</a>
				  	<a class="nav-link" id="v-pills-dimension-tab" data-toggle="pill" href="#v-pills-dimension" role="tab" aria-controls="v-pills-dimension" aria-selected="false">Product Dimensions</a>
				  	<a class="nav-link" id="v-pills-metal-tab" data-toggle="pill" href="#v-pills-metal" role="tab" aria-controls="v-pills-metal" aria-selected="false">Metal Information</a>
				  	<a class="nav-link" id="v-pills-other-tab" data-toggle="pill" href="#v-pills-other" role="tab" aria-controls="v-pills-other" aria-selected="false">Others</a>
				</div>
			</div>
			<div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
				  	<div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
				  		<h3>Add Products</h3>
				  		<label class="mt-3">Choose Category</label>
				  		<select class="form-control" id="category">
				  			<option>Choose...</option>
				  			@forelse($categories as $category)
				  				<option value="{{$category->id}}">{{$category->name}}</option>
				  				@empty{{''}}
				  			@endforelse
				  		</select>
				  		<label class="mt-3">Choose Subcategory</label>
				  		<select id="subcategory" class="form-control" disabled="disabled">
				  			<option>Choose...</option>
				  		</select>
				  	</div>
				  	<div class="tab-pane fade" id="v-pills-dimension" role="tabpanel" aria-labelledby="v-pills-dimension-tab">dimensions</div>
				  	<div class="tab-pane fade" id="v-pills-metal" role="tabpanel" aria-labelledby="v-pills-metal-tab">Metal information here</div>
				  	<div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">Other Information</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script type="text/javascript">
		$('#v-pills-tab a').on('click', function (e) {
	  		e.preventDefault()
	  		$(this).tab('show')
		})

		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			  e.target // newly activated tab
			  e.relatedTarget // previous active tab
		})

		$(document).on('change', '#category', function(){
			var index = $('#category option:selected').index();
			if(index !== 0)
			{
				$('#subcategory').removeAttr('disabled');	
				//ajax request to update select box
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200)
					{
						json = JSON.parse(this.responseText);
						html = '';
						i = 0;
						for(i = 0; i<json.subcategory.length; i++)
						{
							html += '<option value="'+json.subcategory[i].subcategory_name+'">'+json.subcategory[i].subcategory_name+'</option>';		
						}
						$('#subcategory').empty();
						$('#subcategory').append(html);
					}
				};
				xhttp.open("POST", '/api/add-products/subcategory', true);
				xhttp.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
				xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhttp.send('subcategory='+index);
			}//end if 
			else{
				$('#subcategory').attr('disabled', 'disabled');
			}// end else

		});	

	</script>
	
@endsection