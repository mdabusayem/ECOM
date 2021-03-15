@extends('layouts.master')
@section('content')
<div class="container margin-top-20">
	<div class="row">
		@include('partials.product-sidebar')
		<div class="col-md-8">
			<div class="widget">
				<h3>Feature Products</h3>
				<div class="row">
					@foreach ($products as $product)
					<div class="col-md-4">
						<div class="card" >
							 @php
							 $i=1;
							 @endphp
							   @foreach ($product->images as $images)
							   @if ($i>0)

							   <a href="{{ route('products.show',$product->slug) }}">
							  <img class="card-img-top feature-img" src="{{ asset('images/products/'.$images->image ) }}" alt="{{ $product->title }}">
							</a>
							  @endif
							  @php
								$i--;
							 @endphp
							  @endforeach
							  <div class="card-body">
							    <h4 class="card-title">	
							    	<a href="{{ route('products.show',$product->slug) }}">{{ $product->title }}</a>
							    </h4>
							    <p class="card-text">{{ $product->price }}</p>
							    @include('pages.product.cart-button')
							  </div>	  
						</div>
					</div>					
					@endforeach
				</div>
			</div>
			<div class="mt-4 pagination">
				{{ $products->links() }}
			</div>
		</div>
	</div>
</div>
@endsection