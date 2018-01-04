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
			<a href="{{ $item->editURL() }}" class="btn btn-primary pull-right">Edit</a>
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
			<form method="post" action="{{ route("uploadPhoto", [$item]) }}" enctype="multipart/form-data" class="form-inline validate">
				{!! csrf_field() !!}
					<label for="title" class="h4 mr-2">Upload Photo</label>
					<input type="text" name="title" id="title" placeholder="Title" class="form-control mr-2" data-bvalidator="required">
					<input type="file" name="file" id="file" class="form-control mr-2" data-bvalidator="required">
					
					<input type="submit" value="Upload Photo" class="btn btn-primary">
				</div></div>
				
			</form>
		</div>
	</div>
	
	<h1 class="text-center mt-4 mb-3">Photos</h1>
	
	<div id="photoCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			@foreach ($item->photos as $key => $photo)
			<div class="carousel-item {{ $key==0 ? 'active':'' }}">
			  <img class="d-block img-fluid" src="{{ $photo->url() }}" alt="{{ $photo->title }}">
			</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#photoCarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#photoCarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</main>

@stop