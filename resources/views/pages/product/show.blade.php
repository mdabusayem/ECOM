@extends('layouts.master')
@section('content')
<div class="container margin-top-20">
	<div class="row">
		<div class="col-md-4">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  	@php
  	$i=1;
  	@endphp
    <?php foreach ($product->images as $image): ?>
    	<div class="product-item carousel-item {{ $i ==1 ? 'active':'' }} ">
      <img class="d-block w-100" src="{!! asset('images/products/'.$image->image) !!}" alt="First slide">
    </div>
    @php
    	$i++;
    @endphp
    <?php endforeach ?>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		</div>
		<div class="col-md-8">
			<div class="widget">
				<h2>{{ $product->title }}</h2>
			</div>
			<div class="widget">
					<h3>{{ $product->price }} Taka</h3>
			</div>
			<div class="product-description">
				{{ $product->description }}
			</div>
		</div>
	</div>
</div>
@endsection