@extends('layouts.master')
@section('content')
<div class="card card-body container margin-top-20 mb-3">
	<div class="card card-body">
		<h2>Confirm Items</h2>
	<hr>
	<div class="row">
		<div class="col-md-7 border-right">
		@foreach(App\Cart::totalCarts() as $cart)
	<p>
		{{ $cart->product->title }}-<strong>{{ $cart->product->price }} taka</strong>-{{ $cart->product_quantity }} item
	</p>
	@endforeach
	</div>
	<div class="col-md-5">
		@php
            $total_price=0;
         @endphp
		@foreach(App\Cart::totalCarts() as $cart)
	@php
	$total_price+=$cart->product->price * $cart->product_quantity;
	@endphp
	@endforeach
	<p>
		Total Price: <strong>{{ $total_price }} taka</strong>
	</p>
	<p>
		Total Price with shipping Cost: <strong>{{ $total_price + App\Setting::first()->shipping_cost }} taka</strong>
	</p>
	</div>
	</div>
	<p>
		<a href="{{ route('carts') }}">Change Cart item</a>
	</p>
	</div>
	<div class="card card-body mt-2">
		<h2>Shipping Address</h2>
		<form method="POST" action="{{ route('checkouts.store') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required autofocus>

                                @if ($errors->has('phone_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                                     

                        <div class="form-group row">
                            <label for="street_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="shipping_address" rows="4" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                @if ($errors->has('shipping_address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('shipping_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="street_address" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" rows="4" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="street_address" class="col-md-4 col-form-label text-md-right">{{ __('Payment Method') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" name="payment_method_id" id="payments" required>
                               	<option value="">Select a payment method please</option>
                               	@foreach($payments as $payment)
                               	<option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                               	@endforeach
                                </select>
                               @foreach($payments as $payment)
	                               
	                               	@if($payment->short_name=="cash_in")
	                               	<div id="payment_{{ $payment->short_name }}" class="hidden">
	                               	
	                               		<h3>
	                               			For Cash there is nothing necessary. Just click Finish Order.
	                               			<br>
	                               			<small>
	                               				You will get your product in two or three bussiness days.
	                               			</small>
	                               		</h3>
	                               	</div>
	                               	@else
		                               	<div id="payment_{{ $payment->short_name }}" class="hidden">
		                               		<h3>{{ $payment->name }} Payment </h3>
		                               		<p>
		                               			<strong>{{ $payment->name }} No: {{ $payment->no }}</strong>
		                               			<br>
		                               			<strong>Accoutn type: {{ $payment->type }}</strong>
		                               		</p>
		                               		<div class="alert alert-success">
		                               			Please send the above money to this bkash No and Write your payment transaction.
		                               		</div>
		                               		
		                               					                               		</h3>
		                               	</div>
	                               	@endif

                               @endforeach
                               <input type="text" id="transaction_id" name="transaction_id" class="form-control hidden">

                            </div>
                        </div>


                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  Order Place
                                </button>
                            </div>
                        </div>
                    </form>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$("#payments").change(function(){
		$payment_method=$("#payments").val();
		if ($payment_method=="cash_in") {
			$("#payment_cash_in").removeClass('hidden');
			$("#payment_bkash").addClass('hidden');
			$("#payment_rocket").addClass('hidden');
		}
		else if ($payment_method=="bkash") {
			$("#payment_bkash").removeClass('hidden');
			$("#payment_cash_in").addClass('hidden');
			$("#payment_rocket").addClass('hidden');
			$("#transaction_id").removeClass('hidden');
		}
		if ($payment_method=="rocket") {
			$("#payment_rocket").removeClass('hidden');
			$("#payment_bkash").addClass('hidden');
			$("#payment_cash_in").addClass('hidden');
			$("#transaction_id").removeClass('hidden');
		}
		
	})
</script>
@endsection