@extends("app")

@section("page-title")
List - 
@stop

@section("content")

<main role="main" class="container">
	<div id="msgs"></div>
	<div class="table-responsive">
		<table class="table table-striped table-links sortable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Quantity</th>
					<th>Category</th>
					<th>URL</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($items as $item)
				<tr>
					<td><a href="{{ route('item', [$item]) }}">{{ $item->name }}</a></td>
					<td>{{ $item->quantity }}</td>
					<td>{{ $item->category }}</td>
					<td>{{ $item->url }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</main>

@stop