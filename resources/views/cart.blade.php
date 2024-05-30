{{-- officially yours cart --}}

@extends('layouts.app')
@section('content')


@if(session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif



<div style="margin-top:100px;"></div>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{url('/')}}" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>


    {{--  --}}
    {{-- Illuminate\Support\Collection {#302 ▼
        #items: array:1 [▼
          "b52aa74387de70e574907f6f2a86508a" => Gloudemans\Shoppingcart\CartItem {#300 ▼
            +rowId: "b52aa74387de70e574907f6f2a86508a"
            +id: 2
            +qty: 1
            +name: "Rose Ruffle Dress"
            +price: 4000.0
            +weight: 200.0
            +options: Gloudemans\Shoppingcart\CartItemOptions {#301 ▼
              #items: array:3 [▼
                "image_path" => "Kleita Official/Rose Ruffle Dress/Black/1.jpg"
                "size" => "XS"
                "color" => "Black"
              ]
              #escapeWhenCastingToString: false
            }
            +taxRate: 21
            -associatedModel: null
            -discountRate: 0
            +instance: "default"
          }
        ]
        #escapeWhenCastingToString: false
      } --}}

    {{--  --}}
		

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									{{-- <th class="column-4">Quantity</th> --}}
									{{-- <th class="column-5">Action</th> --}}
								</tr>

                                @foreach ($carts as $cart)

								<tr class="table_row">
									<td class="column-1">
										{{-- <div class="how-itemcart1"> --}}
                                        <div class="how-itemcart1">
											{{-- <img src="images/item-cart-04.jpg" alt="IMG"> --}}
                                            <img src=" {{asset('photos/'.$cart->options->image_path)}} " class="img-fluid img-responsive"/>
										</div>
									</td>
									<td class="column-2">
                                        <p>{{$cart->name}}</p>
                                        <small>{{$cart->options->size}}</small>
                                        <br>
                                        <small>{{$cart->options->color}}</small>
                                        
                                    </td>
									<td class="column-3">₱ {{number_format($cart->price,0)}}</td>
									{{-- <td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td> --}}
									<td class="column-5">
                                        {{-- $ 36.00 --}}
                                        {{-- <td class="pr-remove"> --}}
                                        <a href="{{ url('remove-cart/'.$cart->rowId) }}" title="Remove">
                                            <i class="fa fa-times" style="color: black !important; text-align:center !important;"></i>                                        
                                        </a>
                                        {{-- </td> --}}
                                    </td>
								</tr>

                                @endforeach

								{{-- <tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="images/item-cart-05.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-2">Lightweight Jacket</td>
									<td class="column-3">$ 16.00</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">$ 16.00</td>
								</tr> --}}
							</table>
						</div>

						{{-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div> --}}
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						{{-- <div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$79.65
                                    ₱ {{ $subTotal }}
                                    <td class="column-3">₱ {{number_format($cart->price,0)}}</td>
								</span>
							</div>
						</div> --}}

						{{-- <div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>
									
									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
										
								</div>
							</div>
						</div> --}}

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									₱ {{ $subTotal }}
								</span>
							</div>
						</div>


						<br>

						@if(Auth::check())
							{{-- <form action="{{ route('payment.createInvoice') }}" method="POST"> --}}
							<form action="#" method="POST">
								@csrf
								<input type="hidden" name="name" value="{{ $cart->name }}">
								<input type="hidden" name="image_path" value="{{ $cart->options->image_path }}">
								<input type="hidden" name="size" value="{{ $cart->options->size }}">
								<input type="hidden" name="color" value="{{ $cart->options->color }}">
								<input type="hidden" name="price" value="{{ $subTotal }}">

								<a href="{{url('checkout')}}" type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Proceed to checkout							
								</a>
							</form>							
							
						@else
							<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								<a href="{{url('login')}}" style="color: white !important;">
									Please Log In first to checkout
								</a>
							</button>
						@endif

						<div style="padding-top: 5%;"></div>

						
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Message us in Viber /  <a href="{{url('https://wa.me/639064495863')}}" target="_blank">Whatsapp</a> 
						</button>

                        {{-- <script async src="https://js.stripe.com/v3/buy-button.js"></script> --}}
                        {{-- <stripe-buy-button buy-button-id="buy_btn_1OoqEtBKfxkV2cAgh2iS8mE6" publishable-key="pk_test_51MkSBtBKfxkV2cAgn0C14eap55rL9Obztxkzox85oNsoSr4XG1nBPSGoyHoGhyHBAE9j1gS1ksCxDPsTlV2mF1MG00pXuOG2ZE"> </stripe-buy-button> --}}

                        





					</div>
				</div>
			</div>
		</div>
	</form>

@endsection