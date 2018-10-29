@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				
			</div>
		</div>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Product type</th>
					<th scope="col">Product name</th>
					<th scope="col">Price</th>
					<th scope="col">Availability</th>
					<th scope="col">Actions</th>	
				</tr>
			</thead>
			<tbody>
				@forelse($products as $product)
					<tr>
						<th scope="row">{{$product->id}}</th>
						<td>{{DB::table('categories')->where('id', $product->category)->first()->name}} {{$product->subcategory}}</td>
						<td>{{$product->product_name}}</td>
						<td>{{$product->price}}</td>
						<td><span class="{{($product->availability == 'on')?'text-success':'text-danger'}}">{{($product->availability == 'on')?'In stock':'Sold Out'}}</td>
						<td><i class="fas fa-edit"></i><i class="fas fa-trash ml-4"><a href="/show-products/remove"></a></i></td>
					</tr>
					@empty{{''}}
				@endforelse
			</tbody>
		</table>
	</div>
@endsection