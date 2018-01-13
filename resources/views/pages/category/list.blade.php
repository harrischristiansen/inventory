@extends("app")

@section("page-title")
Categories - 
@stop

@section("content")

<main role="main" class="container">
	<div id="msgs"></div>
	<div class="table-responsive">
		<table class="table table-striped table-links sortable">
			<thead>
				<tr>
					<th>Category Name</th>
					<th># Items</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
				<tr>
					<td><a href="#">{{ $category->name }}</a></td>
					<td>{{ count($category->items) }}</td>
				</tr>
				@endforeach
				<tr>
					<td><b>Add New Category:</b></td>
					<td>
						<form method="post" action="{{ route('createCategory') }}" enctype="multipart/form-data" class="form-inline validate">
							{!! csrf_field() !!}
							<input type="text" name="name" placeholder="Category Name" class="form-control mr-2 categoriesTypeahead" data-bvalidator="required">
							<input type="submit" value="Add Category" class="btn btn-primary">
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</main>

@stop