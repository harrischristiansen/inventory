@extends("app")

@section("page-title")
Category - {{ $category->name }} - 
@stop

@section("content")

<main role="main" class="container">
	<div id="msgs"></div>
	
	<div class="card">
		<ol class="breadcrumb no-bottom-margin">
			<li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
		</ol>
		<div class="card-body">
			<a href="#" class="btn btn-primary pull-right">Edit</a>
			<h3 class="card-title">{{ $category->name }}</h3>
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><b># Items:</b> {{ count($category->items) }}</li>
		</ul>
	</div>
	
	<h1 class="text-center m-4">Items</h1>
	
	<div class="table-responsive">
		@include('pages.item.table', ['items' => $category->items])
	</div>
</main>

@stop