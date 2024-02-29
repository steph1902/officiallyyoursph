@extends('layouts.app')
@section('content')

<style>
    @media (min-width: 768px)
    {

    .navbar-transparent {
        //background: #000000 !important;
        background: #ffffff !important;

    }

    .btn.btn-b
    {
        background: {{ $product->product_color_code }} !important;
        border: 1px solid white !important;
    }


    *:not(.fa)
    {
        //font-family:'Milliard Book' !important;
    }
    .landing-screenshot:before
    {
        background-color: #F4F3F0 !important;
    }

    .module-medium
    {
        padding-top:10px !important;
        padding-bottom: 10px !important;
    }
    .module
    {
        padding-top:10px !important;
        padding-bottom: 10px !important;
    }
    .module-title
    {
        margin: 0 0 0 0;
    }
}



/* desktop */
@media screen and (min-width: 768px)
{
    .product-carousel-desktop
    {
        display: contents !important;
        visibility: visible !important;
    }
    .product-carousel-mobile
    {
        display: none !important;
        visibility: hidden !important;
    }
}


/* mobile */
@media screen and (max-width: 767px)
{

    .product-carousel-desktop
    {
        display: none !important;
        visibility: hidden !important;
    }
    .product-carousel-mobile
    {
        display: contents !important;
        visibility: visible !important;
    }
}

.main
{
    background-color: #F4F3F0 !important;
}




</style>


      <div class="main">
        <section class="module" style="background: {{ $product->product_color_code }}; margin-top:50px;">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 mb-sm-40">
                  <a class="gallery" href="{{ asset('products/'.$product->product_photo) }}">
                    <img src="{{ asset('products/'.$product->product_photo) }}" alt="{{ $product->product_name }}"/>
                  </a>

                <ul class="product-gallery text-center" style="margin:0px;">
                    @foreach ($productPhotos as $productPhoto)
                    <li>
                        <a class="gallery" href="{{ asset('products/'.$productPhoto->product_photos) }}" target="_blank">
                            <img src="{{ asset('products/'.$productPhoto->product_photos) }}" alt=""/>
                        </a>
                    </li>
                    @endforeach
                </ul>
              </div>
              <div class="col-sm-6" style="padding-top:100px;">
                <div class="row">
                  <div class="col-sm-12">
                    <h1 class="product-title font-alt" style="font-size: 22px !important; color:white !important;">
                        {{ $product->product_name }}
                    </h1>
                    <h3 style="font-size: 18px !important; color:white !important;">
                        {{ $product->product_brand }}
                    </h3>

                    <p style="padding-top:30px; padding-bottom:30px; color:white !important; font-size:16px !important;">
                        {{--  {{ $product->product_description }}  --}}
                        {!!html_entity_decode($product->product_description)!!}
                    </p>
                  </div>
                </div>

                <div class="row mb-20">
                  <div class="col-sm-12">
                    <div class="price font-alt"><span class="amount" style="color:white !important;">
                        IDR {{ number_format($product->product_price,0) }}</span></div>
                  </div>
                </div>

                <div class="row mb-20">

                <form method="POST" action="{{ action('FrontendController@addToCart',['id' => $product->id]) }}" accept-charset="UTF-8">
                @csrf

                  <div class="col-sm-4 mb-sm-20">
                    <input class="form-control input-lg" type="number" name="qty" value="1" max="40" min="1" required="required"/>
                  </div>
                  <div class="col-sm-8"><button type="submit" class="btn btn-lg btn-block btn-round btn-b" style="color: white !important;">Add To Cart</button></div>

                </form>


                </div>

              </div>
            </div>

            <div class="row" class="text-center" style="padding-top:50px; padding-bottom:50px;">
                <div class="col-md-2 text-center">
                   <img src="{{ asset('icons/icon/1.png') }}" alt="">
                   <p style="color:white !important; font-size:15px;">
                        Kaya akan serat
                   </p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('icons/icon/2.png') }}" alt="">
                    <p style="color:white !important; font-size:15px;">
                        No MSG
                   </p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('icons/icon/3.png') }}" alt="">
                    <p style="color:white !important; font-size:15px;">
                        Bebas Gluten
                   </p>

                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('icons/icon/4.png') }}" alt="">
                    <p style="color:white !important; font-size:15px;">
                        Tanpa Bahan Pengawet
                   </p>

                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('icons/icon/5.png') }}" alt="">
                    <p style="color:white !important; font-size:15px;">
                        No Trans Fat
                   </p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('icons/icon/6.png') }}" alt="">
                    <p style="color:white !important; font-size:15px;">
                        Cholesterol Free
                   </p>
                </div>
                {{--  <div class="col-md-1">
                    <img src="{{ asset('icons/icon/7.png') }}" alt="">
                </div>  --}}
            </div>


          </div>
        </section>


        {{--  desktop  --}}
        {{--  omg  --}}
        <section class="module-medium product-carousel-desktop" id="about" style="background-color: #F4F3F0 !important;">
            <div class="container" style="background-color: #F4F3F0 !important;">
              <div class="row">
                {{-- <div class="col-sm-12 col-sm-offset-2"> --}}
                <div class="col-sm-12" style="padding-top:30px !important;">
                  {{-- <h2 class="extra-bold"
                  style="text-transform:none; text-align:center !important; font-weight:bold; padding: 0px !important; "> --}}
                  <h2 class="extra-bold"
                  style="text-align:center !important;">
                      <span>
                          {{--  The POPPING Rangers.. come closer!  --}}
                          Wait.. there is more!
                      </span>
                      <br>
                  </h2>

                  <h4 style="text-align: center !important;">
                      <span>
                          {{--  We present to you.. Oh Ma Grain!  --}}
                      </span>
                  </h4>


                    <section class="module  parallax-bg landing-screenshot"
                      data-background="">
                      <div class="container">

                        <div class="row client">
                          <div class="owl-carousel text-center" data-items="3" data-pagination="true" data-navigation="false">

                          @foreach ($omgs as $omg)
                            <div class="owl-item">
                              <div class="col-sm-12">

                                  {{--  <img src="{{ asset('products/'.$product->product_photo) }}" width="350px" height="350px">  --}}
                                  <a href="{{ route('product-details' , [$omg->id , $omg->product_slug]) }}">
                                    <img src="{{ asset('products/'.$omg->product_photo) }}" class="img-fluid img-responsive">
                                  </a>


                                  <a href="{{ route('product-details' , [$omg->id , $omg->product_slug]) }}">
                                    <p class="" style="font-size: 18px; font-weight:bold; color:black;">
                                        {{ $omg->product_name }}
                                    </p>
                                  </a>
                              </div>
                            </div>
                          @endforeach


                          </div>
                        </div>
                      </div>
                    </section>

                </div>
              </div>
            </div>
          </section>
          {{--  omg  --}}
          {{--  desktop  --}}


          {{--  mobile  --}}
          <section class="module-medium product-carousel-mobile" id="about" style="background-color: #F4F3F0 !important;">
            <div class="container" style="background-color: #F4F3F0 !important;">
              <div class="row">
                {{-- <div class="col-sm-12 col-sm-offset-2"> --}}
                <div class="col-sm-12" style="padding-top:30px !important;">
                  <h2 class="extra-bold"
                  style="text-align:center !important;">
                      <span>
                          {{--  The POPPING Rangers.. come closer!  --}}
                          Wait.. there is more!
                      </span>
                      <br>
                  </h2>

                  <h4 style="text-align: center !important;">
                      <span>
                          {{--  We present to you.. Oh Ma Grain!  --}}
                      </span>
                  </h4>


                    <section class="module  parallax-bg landing-screenshot" data-background="" style="padding: 0px 0px 0px 0px !important;">
                      <div class="container">

                        <div class="row client">
                          <div class="owl-carousel text-center" data-items="1" data-pagination="true" data-navigation="false">

                          @foreach ($omgs as $omg)
                            <div class="owl-item">
                              <div class="col-sm-12">

                                  {{--  <img src="{{ asset('products/'.$product->product_photo) }}" width="350px" height="350px">  --}}
                                  <a href="{{ route('product-details' , [$omg->id , $omg->product_slug]) }}">
                                    <img src="{{ asset('products/'.$omg->product_photo) }}" class="img-fluid img-responsive">
                                  </a>


                                  <a href="{{ route('product-details' , [$omg->id , $omg->product_slug]) }}">
                                    <p class="" style="font-size: 18px; font-weight:bold; color:black;">
                                        {{ $omg->product_name }}
                                    </p>
                                  </a>
                              </div>
                            </div>
                          @endforeach


                          </div>
                        </div>
                      </div>
                    </section>

                </div>
              </div>
            </div>
          </section>
          {{--  mobile  --}}


          {{--  kpg  --}}
          {{--  desktop  --}}
          <section class="module-medium product-carousel-desktop" id="about" style="background-color: #F4F3F0 !important;">
            <div class="container"  style="background-color: #F4F3F0 !important;">
              <div class="row">

                <div class="col-sm-12" style="padding-top:0px !important; padding-bottom:0px !important;">


                    <h2 class="extra-bold"
                    style="text-align:center !important;">
                    <span>
                        You might like this too
                    </span>
                    <br>
                </h2>

                    <section class="module  parallax-bg landing-screenshot"
                      data-background="">
                      <div class="container">

                        <div class="row client">
                          <div class="owl-carousel text-center" data-items="3" data-pagination="true" data-navigation="false">

                          @foreach ($rnss as $rns)
                            <div class="owl-item">
                              <div class="col-sm-12">

                                <a href="{{ route('product-details' , [$rns->id , $rns->product_slug]) }}">
                                  <img src="{{ asset('products/'.$rns->product_photo) }}" width="200px" height="200px">
                                </a>

                                <a href="{{ route('product-details' , [$rns->id , $rns->product_slug]) }}">
                                  <p class="" style="font-size: 18px; font-weight:bold; color: #A6816E !important">
                                      {{ $rns->product_name }}
                                  </p>
                                </a>

                              </div>
                            </div>
                          @endforeach


                          </div>
                        </div>
                      </div>
                    </section>




                </div>
              </div>
            </div>
          </section>
          {{--  desktop  --}}
          {{--  kpg  --}}

          {{--  mobile  --}}
          <section class="module-medium product-carousel-mobile" id="about" style="background-color: #F4F3F0 !important; padding: 0px 0px 0px 0px !important;">
            <div class="container"  style="background-color: #F4F3F0 !important;">
              <div class="row">

                <div class="col-sm-12" style="padding-top:0px !important; padding-bottom:0px !important;">


                    <h2 class="extra-bold"
                    style="text-align:center !important;">
                    <span>
                        You might like this too
                    </span>
                    <br>
                </h2>

                    <section class="module  parallax-bg landing-screenshot" data-background="" style="padding: 0px 0px 0px 0px !important;">
                      <div class="container">

                        <div class="row client">
                          <div class="owl-carousel text-center" data-items="1" data-pagination="true" data-navigation="false">

                          @foreach ($rnss as $rns)
                            <div class="owl-item">
                              <div class="col-sm-12">

                                <a href="{{ route('product-details' , [$rns->id , $rns->product_slug]) }}">
                                  <img src="{{ asset('products/'.$rns->product_photo) }}" width="200px" height="200px">
                                </a>

                                <a href="{{ route('product-details' , [$rns->id , $rns->product_slug]) }}">
                                  <p class="" style="font-size: 18px; font-weight:bold; color: #A6816E !important">
                                      {{ $rns->product_name }}
                                  </p>
                                </a>

                              </div>
                            </div>
                          @endforeach


                          </div>
                        </div>
                      </div>
                    </section>




                </div>
              </div>
            </div>
          </section>

          {{--  mobile  --}}


      </div>



      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>


    @endsection
