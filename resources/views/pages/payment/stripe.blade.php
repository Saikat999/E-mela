@extends('layouts.app')

@section('content')
@include('layouts.menubar')

@php

    $setting = DB::table('settings')->first();
    $charge = $setting->shipping_charge;
    $vat = $setting->vat;
    $totalvat = Cart::subtotal() * $vat/100;
    $cart = Cart::content();
 
@endphp





       
<link rel="stylesheet" type="text/css" href="{{asset('../frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('..frontend/styles/contact_responsive.css')}}">

     <div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-7" style="border: 1px solid grey; padding:20px; border-radius:25px">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Cart Product</div>

						 
                         <div class="cart_items">
							<ul class="cart_list">
                                @foreach ($cart as $row)
            
								<li class="cart_item clearfix">
									
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title"><b>Product Image</b></div>
											<div class="cart_item_text"><img src="{{asset($row->options->image)}}" style="width: 70px; height:70px" alt=""></div>
										</div>
                                        
                                        <div class="cart_item_name cart_info_col">
											<div class="cart_item_title"><b>Name</b></div>
											<div class="cart_item_text text-center">{{$row->name}}</div>
										</div>
                                        @if ($row->options->color == NULL)
                                            
                                        @else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title"><b>Color</b></div>
											<div class="cart_item_text text-center">{{$row->options->color}}</div>
										</div>
                                        @endif

                                        @if ($row->options->size == NULL)
                                            
                                        @else
                                            <div class="cart_item_color cart_info_col">
											<div class="cart_item_title"><b>Size</b></div>
											<div class="cart_item_text text-center">{{$row->options->size}}</div>
										</div>
                                        @endif
                                        
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title"><b>Quantity</b></div>
											<div class="cart_item_text text-center">{{$row->qty}}</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title"><b>Price</b></div>
											<div class="cart_item_text text-center">Tk-{{$row->price}}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title"><b>Total</b></div>
											<div class="cart_item_text text-center">Tk-{{$row->price*$row->qty}}</div>
										</div>
                                        
									</div>
								</li>
                               @endforeach
							</ul>
						</div>


                         <ul class="list-group col-lg-8" style="float: right;">
                        @if (Session::has('coupon'))
                            <li class="list-group-item">Subtotal: <span style="float: right;">{{Session::get('coupon')['balance']}} tk</span></li>
                            <li class="list-group-item">Coupon: ({{Session::get('coupon')['name']}}) 
                            <a href="{{route('coupon.remove')}}" class="btn btn-danger btn-sm">x</a>
                            <span style="float: right;">{{Session::get('coupon')['discount']}} tk</span></li>
                        @else
                            <li class="list-group-item">Subtotal: <span style="float: right;">{{ Cart::subtotal()}} tk</span></li>
                            
                        @endif
                         
                         
                         <li class="list-group-item">Shipping Charge: <span style="float: right;">{{$charge}} tk</span></li>
                         @if (Session::has('coupon'))
                             <li class="list-group-item">Vat: ({{$vat}}%) <span style="float: right;">{{Session::get('coupon')['balance'] *$vat/100}} tk</span></li>
                         @else
                             <li class="list-group-item">Vat: ({{$vat}}%) <span style="float: right;">{{$totalvat}} tk</span></li>
                         @endif
                         
                         @if (Session::has('coupon'))
                            <li class="list-group-item">Total: <span style="float: right;">{{Session::get('coupon')['balance'] + $charge + Session::get('coupon')['balance'] *$vat/100}} tk</span></li>
                         @else
                             <li class="list-group-item">Total: <span style="float: right;">{{Cart::subtotal() + $charge + $totalvat }} tk</span></li>
                         @endif
                         

                        </ul>


					</div>
				</div>



                
                <div class="col-lg-5" style="border: 1px solid grey; padding:20px; border-radius:25px">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Shipping Address</div>

						<form id="payment-form">

						<div id="card-element"><!--Stripe.js injects the Card Element--></div>

						<button id="submit">

							<div class="spinner hidden" id="spinner"></div>

							<span id="button-text">Pay now</span>

						</button>

						{{-- <p id="card-error" role="alert"></p>

						<p class="result-message hidden">

							Payment succeeded, see the result in your

							<a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.

						</p> --}}

						</form>
					</div>
				</div>

			</div>
		</div>
		<div class="panel"></div>
	</div>



@endsection
