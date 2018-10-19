@extends('layouts.app')

@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h3>Add Subcategory</h3>

					<label class="mt-4">Choose category</label>
					<select class="form-control" name = "category" id="category">
						@forelse($allcategories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
							@empty{{''}}
						@endforelse
					</select>
					<label class="mt-4">Add subcategory name</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="fas fa-plus"></i>
							</span>
						</div>
						<input type="text" name="subcategory_name" id="subcategory_name" class="form-control" aria-label="Subcategory" placeholder="Subcategory name">
					</div>
					<button type="submit" class="btn btn-outline-secondary mt-4" id="btn_add">Add</button>	
				</div>
			</div>
		</div>
@endsection
@section('js')
	<script type="text/javascript">
		$(document).on('click', '#btn_add', function(){
			var subcategory = $('#subcategory_name').val();
			var category = $('#category').val();
			console.log(category+" "+subcategory);
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200)
				{
					console.log(this.responseText);
					alert("Added Successfully");
				}
			};
			xhttp.open("POST", '/api/category/add-subcategory/add', true);
			xhttp.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
			xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhttp.send('category='+category+'&subcategory='+subcategory);
		});
	</script>
@endsection