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
		</div>
@endsection
