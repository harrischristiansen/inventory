@extends("app")

@section("page-title")
Item - 
@stop

@section("content")

<main role="main" class="container">
	<div id="msgs"></div>
	
	<div class="card">
		<ol class="breadcrumb no-bottom-margin">
			<li class="breadcrumb-item"><a href="{{ route('list') }}">Items</a></li>
			@if ($item->category)
			<li class="breadcrumb-item"><a href="#">{{ $item->category }}</a></li>
			@endif
			<li class="breadcrumb-item active" aria-current="page">{{ $item->name ?: "Unnamed Item" }}</li>
		</ol>
		<div class="card-body">
			<h3 class="card-title">{{ $item->name }}</h3>
			<p class="card-text">{{ $item->description }}</p>
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><b>Quantity:</b> {{ $item->quantity }}</li>
			@if ($item->category)
			<li class="list-group-item"><b>Category:</b> {{ $item->category }}</li>
			@endif
			@if ($item->url)
			<li class="list-group-item"><b>URL:</b> <a href="{{ $item->url }}">{{ $item->url }}</a></li>
			@endif
		</ul>
		<div class="card-body">
			<a href="{{ $item->editURL() }}" class="btn btn-primary">Edit</a>
		</div>
	</div>
</main>

@stop