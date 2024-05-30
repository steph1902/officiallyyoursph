@extends('layouts.app')
@section('content')



<style>
    @media (min-width: 768px){
    .navbar-transparent {
        background: #ffffff !important;
    }

.checkout-table tbody tr td:first-child,
.checkout-table tbody tr th:first-child {
    max-width: 72px;
}
}

*:not(.fa)
{
    font-family:'Milliard Book' !important;
}


.navbar-custom .nav li>a
{

}
.navbar-custom .dropdown-menu {
    background: #ffffff !important;
}


    hr
    {
        border: 1px solid #F7941D !important;
    }


.btn
{
    color: white !important;
    font-family:'Milliard Book' !important;

}

.btn-lg
{
    color: white !important;
    font-family:'Milliard Book' !important;

}
</style>


<div class="wrapper" style="background: #F4F3F0 !important; padding-top:50px; padding-bottom:150px;">

{{--  header  --}}
<section class="module" style="padding-bottom:20px;">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-4">
                <p style="font-weight: bold !important; font-size:18px !important;">
                Your Bag
                </p>
                 <hr>
            </div>
            <div class="col-sm-4">
                Your Details
            </div>
            <div class="col-sm-4">
                Confirm & Pay
            </div>
        </div>
    </div>
</section>

{{--  header  --}}




      <div class="main" style="background: #F4F3F0 !important; padding-top:50px;">
        <section class="module" style="padding-top:0px;">
          <div class="container">
            {{-- <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt">Shopping Cart</h1>
              </div>
            </div> --}}
            {{-- <hr class="divider-w pt-20"> --}}
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped table-border checkout-table">
                  <tbody>
                    <tr>
                      <th class="hidden-xs">Item</th>
                      <th>Description</th>
                      <th class="hidden-xs">Price</th>
                      <th>Quantity</th>
                      <th>Update</th>
                      <th>Remove</th>
                    </tr>

                    @foreach ($carts as $cart)
                    <tr>
                      <td class="hidden-xs">
                         {{-- <a href="#"> --}}
                          <img src=" {{asset('products/'.$cart->options->image_path)}} " class="img-fluid img-responsive"/>
                        {{-- </a> --}}
                      </td>
                      <td>
                        <h5 class="product-title font-alt">{{ $cart->name }} </h5>
                      </td>
                      <td class="hidden-xs">
                        <h5 class="product-title font-alt">IDR {{ number_format($cart->price,0) }}</h5>
                      </td>

                      <form action="{{ action('FrontendController@updateCart',['id' => $cart->rowId]) }}" method="POST" accept-charset="UTF-8">
                      @csrf

                      <td>
                        <input class="form-control" type="number" name="qty" value="{{ $cart->qty }}" max="50" min="1"/>
                      </td>
                      <td>

                        <h5 class="product-title font-alt"> <button type="submit"> <i class="fa fa-pencil" aria-hidden="true"></i> </button> </h5>
                      </td>




                      <td class="pr-remove"><a href="{{ url('remove-cart/'.$cart->rowId) }}" title="Remove"><i class="fa fa-times"></i></a></td>

                        </form>
                    </tr>

                    @endforeach


                  </tbody>
                </table>
              </div>
            </div>

            <div class="row">



                {{--  kpg  --}}

              <div class="col-sm-3">
                <div class="form-group">
                    <form method="POST" action="{{action('FrontendController@validateCoupon')}}">
                    @csrf


                    {{--  @if (Auth::check() && session()->get('discount_flag') == 0 )  --}}
                  <input class="form-control" type="text" id="" name="coupon_code" placeholder="Coupon code"/>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <button class="btn btn-block btn-round btn-d pull-right" type="submit">Apply</button>
                  @if(session()->has('coupon_message') && session()->has('coupon_code_name'))
                    <br> <p>  COUPON Applied: <b> {{session()->get('coupon_code_name')}} </b> </p>
                  @endif

                  @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <br> <small style="color:red;">{{ $error }}</small>
                    @endforeach
                   @endif

                </form>
                </div>
              </div>

              {{--  kpg  --}}


              <div class="col-sm-3 col-sm-offset-3">
                <div class="form-group">
                  <a href="{{ url('empty-cart') }}" class="btn btn-block btn-round btn-d pull-right" type="submit">Empty Cart</a>
                </div>
              </div>
            </div>
            <hr class="divider-w">
            <div class="row mt-70">
              <div class="col-sm-5 col-sm-offset-7">
                <div class="shop-Cart-totalbox">
                  <h4 class="font-alt">Cart Totals</h4>
                  <table class="table table-striped table-border checkout-table">
                    <tbody>
                      <tr>
                        <th>Cart Subtotal :</th>
                        <td>IDR {{ number_format($subTotal,0) }}</td>
                      </tr>

                      {{--  coupon  --}}

                      <tr>
                          <th>Discount</th>
                          <td>IDR {{number_format(session()->get('coupon_discount_price'),0)}}</td>
                      </tr>

                      {{--  <tr>
                          <th>After Discount</th>
                          <td>IDR {{number_format($subTotal - session()->get('price_after_discount'),0)}}</td>
                      </tr>  --}}

                      @endif

                      {{--  coupon  --}}



                      <tr>
                        <th>Shipping Cost :</th>
                        <td>Will be calculated later</td>
                      </tr>
                      <tr class="shop-Cart-totalprice">
                        <th>Total :</th>
                        <td>IDR {{ number_format($subTotal - session()->get('coupon_discount_price') ,0) }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="{{ url('checkout') }}" class="btn btn-lg btn-block btn-round btn-d" type="submit">Proceed to Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </section>


      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>



</div>
    @endsection
