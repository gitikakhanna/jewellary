@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<form method="POST" action="/save-product" enctype="multipart/form-data">
			<div class="row">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					  	<a class="nav-link active show" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">General</a>
					  	<a class="nav-link" id="v-pills-dimension-tab" data-toggle="pill" href="#v-pills-dimension" role="tab" aria-controls="v-pills-dimension" aria-selected="false">Product Dimensions</a>
					  	<a class="nav-link" id="v-pills-metal-tab" data-toggle="pill" href="#v-pills-metal" role="tab" aria-controls="v-pills-metal" aria-selected="false">Metal Information</a>
					  	<a class="nav-link" id="v-pills-price-tab" data-toggle="pill" href="#v-pills-price" role="tab" aria-controls="v-pills-price" aria-selected="false">Price Breakup</a>
					  	<a class="nav-link" id="v-pills-other-tab" data-toggle="pill" href="#v-pills-other" role="tab" aria-controls="v-pills-other" aria-selected="false">Others</a>
					</div>
				</div>
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
					  	<div class="tab-pane fade show active in" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
					  		<h3>Add Products</h3>
					  		<div class="row">
					  			<div class="col-6">
					  				<label class="mt-3">Choose Category</label>
							  		<select class="form-control" id="category" name="category">
							  			<option>Choose...</option>
							  			@forelse($categories as $category)
							  				<option value="{{$category->id}}">{{$category->name}}</option>
							  				@empty{{''}}
							  			@endforelse
							  		</select>		
					  			</div>
					  			<div class="col-6">
					  				<label class="mt-3">Choose Subcategory</label>
							  		<select id="subcategory" class="form-control" disabled="disabled" name = "subcategory">
							  			<option>Choose...</option>
							  		</select>		
					  			</div>
					  		</div>
					  		
					  		<label class="mt-3">Product name</label>
					  		<input type="text" name="product_name" class="form-control" placeholder="Product Name">

					  		<div class="row">
					  			<div class="col-6">
					  				<label class="mt-3">Price</label>
					  				<input type="number" name="price" class="form-control" placeholder="Product Price" min="0">	
					  			</div>
					  			<div class="col-6">
					  				<label class="mt-3">Discount (if any)</label>
					  				<input type="number" name="discount" class="form-control" placeholder="Product Discount" max="100" min="1">
					  			</div>
					  		</div>
					  		<div class="row">
					  			<div class="col-6">
					  				<label class="mt-5">Item Package Quantity</label>
							  		<div class="input-group">
							  			<div class="input-group-prepend">
							  				<a href="#" class="btn btn-sm btn-info decrement-input"><i class="fas fa-minus"></i></a>
							  			</div>
							  			<input readonly type="text" value="0" class="form-control text-center number-input" min="0" name="package_qty">
							  			<div class="input-group-append">
							  				<a href="#" class="btn btn-sm btn-info increment-input"><i class="fas fa-plus"></i></a>
							  			</div>
							  		</div>
					  			</div>
					  			<div class="col-6">
					  				<label class="mt-5">Gender</label>
					  				<select class="form-control" name="gender">
					  					<option>Choose...</option>
					  					<option value="male">Male</option>
					  					<option value="female">Female</option>
					  					<option value="unisex">Unisex</option>
					  				</select>	
					  			</div>	
					  		</div>

					  		<div class="row">
					  			<div class="col-12 form-group">
					  				<label class="mt-3">Description</label>
					  				<textarea class="form-control" rows="15" placeholder="description" id="ckeditor-1" name="description"></textarea>
					  			</div>
					  		</div>
					  		<div class="row">
					  			<div class="col-6">
						  			<label class="mt-3">Images</label>
						  			<input type="file" name="img_url" class="show-preview" accept="image/*" data-target="#prod_img" value="">

						  			<input type="text" name="alt_txt" class="form-control mt-2" placeholder="Alt Text" value="">		
					  			</div>
					  			<div class="col-6">
					  				<img src="/img/image-placeholder.png" class="img-fluid" id="prod_img">	
					  			</div>
					  		</div>
					  		<div class="row">
					  			<input type="checkbox" name="availability" class="form-control" style="width: 5%;"><label>Availability</label>
					  		</div>
					  	</div>
					  	<div class="tab-pane fade" id="v-pills-dimension" role="tabpanel" aria-labelledby="v-pills-dimension-tab">
					  		<h3>Add Products</h3>
					  		<label class="mt-3">Width</label>
					  		<input type="text" name="width" class="form-control" placeholder="Width">
					  		<label class="mt-3">Height</label>
					  		<input type="text" name="height" class="form-control" placeholder="Height">
					  		<label class="mt-3">Product Weight</label>
					  		<input type="text" name="weight" class="form-control" placeholder="weight">
					  	</div>
					  	<div class="tab-pane fade" id="v-pills-metal" role="tabpanel" aria-labelledby="v-pills-metal-tab">
					  		<h3>Add Products</h3>
					  		<label class="mt-3">Metal Type</label>
					  		<input type="text" name="metal_type" class="form-control" placeholder="Type">
					  		<label class="mt-3">Metal Weight</label>
					  		<input type="text" name="metal_weight" class="form-control" placeholder="Weight(approx)">
					  		<label class="mt-3">Color</label>
					  		<input type="text" name="metal_color" class="form-control" placeholder="Color">
					  		<label class="mt-3">Clarity</label>
					  		<input type="text" name="metal_clarity" class="form-control" placeholder="Clarity">
					  	</div>
					  	<div class="tab-pane fade" id="v-pills-price" role="tabpanel" aria-labelledby="v-pills-price-tab">
					  		<h3>Add Products</h3>
					  		<label class="mt-3">Metal Charges</label>
					  		<input type="number" name="metal_charges" min="0" class="form-control" placeholder="Metal Charges">
					  		<label class="mt-3">Making Charges</label>
					  		<input type="number" name="making_charges" min="0" class="form-control" placeholder="Making Charges">
					  		<label class="mt-3">Tax</label>
					  		<input type="number" name="tax_charges" min="0" class="form-control" placeholder="Tax Charges">
					  	</div>
					  	<div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">
					  		<h3>Add Products</h3>
					  		<label class="mt-3">Wearing style</label>
					  		<input type="text" name="wearing_style" class="form-control" placeholder="Wearing Style">
					  		<label class="mt-3">Occassion</label>
					  		<input type="text" name="occassion" class="form-control" placeholder="Occassion">
					  		<label class="mt-3">Theme/Gifting for</label>
					  		<input type="text" name="theme" class="form-control" placeholder="Theme/Gifting for">
					  		<label class="mt-3">Featured</label>
					  		<input type="text" name="featured" class="form-control" placeholder="Featured">
					  	</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					{{csrf_field()}}
					<button class="btn btn-outline-secondary" type="submit">Save Product</button>
					
				</div>
			</div>
		</form>
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
@section('extra-js')
	<script src="https://cdn.ckeditor.com/ckeditor5/10.0.0/classic/ckeditor.js"></script>
	<script type="text/javascript">
		ClassicEditor
	        .create( document.querySelector( '#ckeditor-1' ) )
	        .catch( error => {
	            console.error( error );
	        } );

	   	$(document).on('change','.show-preview',function(){
			var image = $(this).val();
			console.log(image);
			if(image == ''){
				image = '/img/image-placeholder.png';
			}
			$($(this).attr('data-target')).attr('src',image);
		})
	</script>
@endsection