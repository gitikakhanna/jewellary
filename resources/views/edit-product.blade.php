@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<form method="POST" action="/update-product/{{$product->product_code}}" enctype="multipart/form-data">
			<div class="row d-flex align-items-center mb-4">
				<span class="bg-light text-secondary p-2">Product Code</span><small class="font-weight-bold ml-2">{{$product->product_code}}</small>
			</div>
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
								<div class="row">
									<div class="col-12">
										<span class="bg-light text-secondary p-2">Category</span><small class="font-weight-bold ml-2">{{App\Categories::where('id', $product->category)->first()->name}}</small>
									</div>
								</div>
								<label class="mt-4">Choose Subcategory</label>
								  	<select id="subcategory" class="form-control" name = "subcategory">
								  		@forelse($subcategories as $subcategory)
								  			<option value="{{$subcategory->subcategory_name}}" selected="{{$subcategory->subcategory_name == $product->subcategory ? 'selected': ''}}">{{$subcategory->subcategory_name}}</option>
								  			@empty{{''}}
								  		@endforelse
								  	</select>
								<label class="mt-3">Product name</label>
						  			<input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
						  		<div class="row">
						  			<div class="col-6">
						  				<label class="mt-3">Price</label>
						  				<input type="number" name="price" class="form-control" min="0" value="{{$product->price}}">	
						  			</div>
						  			<div class="col-6">
						  				<label class="mt-3">Discount (if any)</label>
						  				<input type="number" name="discount" class="form-control" value = "{{$product->discount}}" max="100" min="1">
						  			</div>
						  		</div>
						  		<div class="row">
						  			<div class="col-6">
						  				<label class="mt-5">Item Package Quantity</label>
								  		<div class="input-group">
								  			<div class="input-group-prepend">
								  				<a href="#" class="btn btn-sm btn-info decrement-input"><i class="fas fa-minus"></i></a>
								  			</div>
								  			<input readonly type="text" value="{{$product->item_package_qty}}" class="form-control text-center number-input" min="0" name="package_qty">
								  			<div class="input-group-append">
								  				<a href="#" class="btn btn-sm btn-info increment-input"><i class="fas fa-plus"></i></a>
								  			</div>
								  		</div>
						  			</div>
						  			<div class="col-6">
						  				<label class="mt-5">Gender</label>
						  				<select class="form-control" name="gender">
						  					<option value="0">Choose</option>
						  					<option value="male" selected="{{$product->gender == 'male'? 'selected':''}}">Male</option>
						  					<option value="female" selected="{{$product->gender == 'female'? 'selected':''}}">Female</option>
						  					<option value="unisex" selected="{{$product->gender == 'unisex'? 'selected':''}}">Unisex</option>
						  				</select>	
						  			</div>
						  		</div>
						  		<div class="row">
						  			<div class="col-12 form-group">
						  				<label class="mt-3">Description</label>
						  				<textarea class="form-control" rows="15" placeholder="description" id="ckeditor-1" name="description">{{$product->description}}</textarea>
						  			</div>
						  		</div>
						  		<div class="row">
						  			<div class="col-6">
							  			<label class="mt-3">Change Product Image</label>
							  			<input type="file" name="image" class="show-preview" accept="image/*" value="">

							  			<input type="text" name="alt_txt" class="form-control mt-2" placeholder="Alt Text" value="">		
						  			</div>
						  			@php
						  				$img = 'uploads/'.$product->image.'';
						  			@endphp
						  			<div class="col-6">
						  				<img src="{{asset($img)}}" class="img-fluid" id="prod_img">	
						  			</div>
						  		</div>
						  		<div class="row">
						  			<input type="checkbox" name="availability" class="form-control" style="width: 5%;" {{$product->availability == 'on'?'checked':''}}><label>Availability</label>	
						  		</div>
						</div>
						<div class="tab-pane fade" id="v-pills-dimension" role="tabpanel" aria-labelledby="v-pills-dimension-tab">
						  	<label class="mt-3">Width</label>
						  	<input type="text" name="width" class="form-control" placeholder="Width" value="{{$productdimension->width}}">
						  	<label class="mt-3">Height</label>
						  	<input type="text" name="height" class="form-control" placeholder="Height" value="{{$productdimension->height}}">
						  	<label class="mt-3">Product Weight</label>
						  	<input type="text" name="weight" class="form-control" placeholder="weight" value="{{$productdimension->weight}}">
						</div>
						<div class="tab-pane fade" id="v-pills-metal" role="tabpanel" aria-labelledby="v-pills-metal-tab">
						  	<label class="mt-3">Metal Type</label>
						  	<input type="text" name="metal_type" class="form-control" value="{{$metalinfo->metal_type}}">
						  	<label class="mt-3">Metal Weight</label>
						  	<input type="text" name="metal_weight" class="form-control" value="{{$metalinfo->metal_weight}}">
						  	<label class="mt-3">Color</label>
						  	<input type="text" name="metal_color" class="form-control" placeholder="Color" value="{{$metalinfo->color}}">
						  	<label class="mt-3">Clarity</label>
						  	<input type="text" name="metal_clarity" class="form-control" placeholder="Clarity" value="{{$metalinfo->clarity}}">
						</div>
						<div class="tab-pane fade" id="v-pills-price" role="tabpanel" aria-labelledby="v-pills-price-tab">
						  	<h3>Add Products</h3>
						  	<label class="mt-3">Metal Charges</label>
						  	<input type="number" name="metal_charges" min="0" class="form-control" value="{{$pricedesc->metal}}">
						  	<label class="mt-3">Making Charges</label>
						  	<input type="number" name="making_charges" min="0" class="form-control" value="{{$pricedesc->making}}">
						  	<label class="mt-3">Tax</label>
						  	<input type="number" name="tax_charges" min="0" class="form-control" value="{{$pricedesc->tax}}">
						</div>
						<div class="tab-pane fade" id="v-pills-other" role="tabpanel" aria-labelledby="v-pills-other-tab">
						  	<label class="mt-3">Wearing style</label>
						  	<input type="text" name="wearing_style" class="form-control" value="{{$otherinfo->wearing_style}}">
						  	<label class="mt-3">Occassion</label>
						  	<input type="text" name="occassion" class="form-control" value="{{$otherinfo->occasion}}">
						  	<label class="mt-3">Theme/Gifting for</label>
						  	<input type="text" name="theme" class="form-control" value="{{$otherinfo->theme}}">
						  	<label class="mt-3">Featured</label>
						  	<input type="text" name="featured" class="form-control" value="{{$otherinfo->featured}}">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					{{csrf_field()}}
					<button class="btn btn-outline-secondary" type="submit">Update Product</button>
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
		})
	</script>
@endsection