@extends('layouts.app')
@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h3>Add Category</h3>
					<form method="POST" action="/add-category/add">
						<div class="input-group mb-3 mt-3">
							<input type="text" class="form-control" name="category_name" placeholder="Add category name" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">
								{{csrf_field()}}
						    	<button class="btn btn-outline-secondary" type="submit">Add</button>
						 	</div>
						</div>
					</form>	
				</div>
			</div>
			<div class="row" class="bg-info mt-4">	
				<div class="col-12 bg-light p-4" style="margin-top:5%;">
					<h3>Categories already added</h3>
					@forelse($categories as $category)
						<div class="btn btn-outline-primary mr-3 mt-4" data-target="{{$category->id}}">
							<a href="#">{{$category->name}}</a>
							<i class="fas fa-times ml-2 remove_cat"></i>
						</div>
						@empty{{'No categories found'}}
					@endforelse
				</div>
			</div>
		</div>
@endsection
@section('js')
	<script type="text/javascript">
		$(document).on('click', '.remove_cat', function(){
			var check = confirm("Are you sure you want to remove this category?");
			if(check == true)
			{
				var val = $(this).attr('data-target');
				console.log(val);
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function()
				{
					if(this.readyState == 4 && this.status == 200)
					{
						console.log(this.responseText);
					}
				};
				xhttp.open("POST", '/api/remove-category', true);
				xhttp.setRequestHeader('X-CSRF-TOKEN',$('meta[name="csrf-token"]').attr('content'));
	            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    	        xhttp.send('id='+val);
    	        $(this).remove();
			}
		});
	</script>
@endsection
