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
		@forelse ($items as $item)
		<tr>
			<td><a href="{{ route('item', [$item]) }}">{{ $item->name }}</a></td>
			<td>{{ $item->quantity }}</td>
			<td>{{ $item->category ? $item->category->name : "" }}</td>
			<td>{{ $item->url }}</td>
		</tr>
		@empty
		<tr>
			<td>No Items Found</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@endforelse
	</tbody>
</table>