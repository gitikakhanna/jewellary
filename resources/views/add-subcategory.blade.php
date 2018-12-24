@extends('layouts.app')

@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h3>Add Subcategory</h3>
					<label class="mt-4">Choose category</label>
					<form action="/category/add-subcategory/add" method="POST">
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
						{{csrf_field()}}
						<button type="submit" class="btn btn-outline-secondary mt-4" id="btn_add">Add</button>	
					</form>
				</div>
			</div>
			<div class="row mt-4">
				@forelse($allcategories as $category)
					<div class="col-3 bg-light p-4">
						<h4>{{$category->name}}</h4>
						@forelse($allsubcategories as $subcategory)
							@if($subcategory->category_id == $category->id)
								<div class="btn btn-outline-primary mr-3 mt-4">
									<a href="#" data-toggle="modal" data-target="#editSubcategory{{$subcategory->id}}">{{$subcategory->subcategory_name}}</a>
									<i class="fas fa-times ml-2 remove_subcat" data-target="{{$subcategory->id}}"></i>
								</div>
								@else
							@endif
							
							@empty{{'No subcategory found'}}
						@endforelse
					</div>
					@empty{{'No category found'}}
				@endforelse
			</div>
		</div>
@endsection
@section('modal')
	@forelse($allsubcategories as $editsubcategory)
		<div class="modal fade" id="editSubcategory{{$editsubcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="editSubcategory" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editSubcategoryLabel">Edit Subcategory</h5>
						<button type="button" class="close" data-dismiss = "modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="/category/add-subcategory/edit" method="POST">
						<div class="modal-body">
							<label>{{App\Categories::where('id', $editsubcategory->category_id)->first()->name}}</label>
							<input type="text" name="editsubcatname" class="form-control" value="{{$editsubcategory->subcategory_name}}">
							<input type="hidden" name = "editsubcatid" value="{{$editsubcategory->id}}">
						</div>
						<div class="modal-footer">
							{{csrf_field()}}
							<button type="submit" class="btn btn-success">Save</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@empty{{''}}
	@endforelse
@endsection

@section('js')
	<script type="text/javascript">
		$(document).on('click', '.remove_subcat', function(){
			var check = confirm("Are you sure you want to remove this subcategory?");
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
				xhttp.open("POST", '/api/remove-subcategory', true);
				xhttp.setRequestHeader('X-CSRF-TOKEN',$('meta[name="csrf-token"]').attr('content'));
	            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    	        xhttp.send('id='+val);
    	        $(this).parent().remove();
			}
		});
	</script>
@endsection