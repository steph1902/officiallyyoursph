<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\ProductPhotos;
use Illuminate\Support\Facades\DB;
use Cart;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Province;
use App\City;
use Illuminate\Support\Carbon;
use RajaOngkir;
use Illuminate\Support\Arr;
use Midtrans;
use App\User;
use Auth;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Log;
use App\Information;
use App\Instagram;
use App\Recipe;
use App\Coupon;

class FrontendController extends Controller
{

    public function __construct(Request $request)
    {
        $this->request = $request;
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        \Midtrans\Config::$is3ds = env('MIDTRANS_IS3DS');

    }
    //
    public function indexView()
    {
        $products = Products::where('product_brand','Oh Ma Grain!')->get();
        $products2 = Products::where('product_brand','Rice n Shine')->get();

        $instagrams = Instagram::all();
        return view('index',compact('products','products2','instagrams'));
    }
    public function productsView()
    {
        $products = Products::all();
        // $type = Products::where('product_brand','=','Oh Ma Grain!')->first();
        return view('allproducts',\compact('products'));
    }
    public function ohMaGrainView()
    {
        $products = Products::where('product_brand','=','Oh Ma Grain!')->get();
        $type = Products::where('product_brand','=','Oh Ma Grain!')->first();
        return view('products',\compact('products','type'));
    }
    public function riceNShineView()
    {
        $products = Products::where('product_brand','=','Rice n Shine')->get();
        $type = Products::where('product_brand','=','Rice n Shine')->first();
        return view('products',\compact('products','type'));
    }


    //information
    public function privacyPolicyView()
    {
        $content = Information::where('type','=','privacy_policy')->first();
        return view('privacypolicy',compact('content'));
    }
    public function shippingAndReturnsView()
    {
        $content = Information::where('type','=','shipping_and_returns')->first();
        return view('shippingandreturn',compact('content'));
    }
    public function termsAndConditionView()
    {
        $content = Information::where('type','=','terms_and_conditions')->first();
        return view('termsandconditions',compact('content'));
    }
    public function frequentlyAskedQuestionView()
    {
        $faq_products = Information::where('type','=','faq_product')->get();
        $faq_orderings = Information::where('type','=','faq_ordering')->get();
        $faq_payment = Information::where('type','=','faq_payment')->first();
        $faq_shipping = Information::where('type','=','faq_shipping')->get();
        return view('faq',compact('faq_products','faq_orderings','faq_payment','faq_shipping'));
    }

    public function aboutUsView()
    {
        $aboutUs = Information::where('type','=','about_us')->first();
        $vision = Information::where('type','=','vision')->first();
        $mission = Information::where('type','=','mission')->first();
        return view('aboutus',compact('aboutUs','vision','mission'));
    }
    public function findUsView()
    {
        return view('findus');
    }

    public function comingSoonView()
    {
        return view('comingsoon');
    }

    public function recipesView()
    {
        // $recipes = Recipe::all();

        $recipes_omg = Recipe::where('category','=','oh_ma_grain')->get();
        $recipes_rns = Recipe::where('category','=','rice_n_shine')->take(4)->get();
        $recipes_17 = Recipe::where('id','=','17')->first();
        return view('recipes',compact('recipes_omg','recipes_rns','recipes_17'));
    }
    public function recipesDetailView($id)
    {
        $recipes = Recipe::findOrFail($id);
        return view('recipes_details',compact('recipes'));
    }
    public function contactUsView()
    {
        return view('contactus');
    }

    public function productDetailView($id,$slug)
    {

        try {
            //code...
            $product = Products::where('product_slug','=',$slug)->first();
            $productPhotos = ProductPhotos::where('product_id', '=', $id)->take(3)->get();

            $omgs = Products::where('product_brand','Oh Ma Grain!')->get();
            $rnss = Products::where('product_brand','Rice n Shine')->get();

        } catch (\Throwable $th) {

        }

        return view('product_details',compact('product','productPhotos','omgs','rnss'));
    }



    // cart

    public function cartView()
    {
        $carts = Cart::content();
        $totalWeight = Cart::weight();
        $subTotal = Cart::subtotal();
        $totalPrice = Cart::total();

        // dd($carts);

        return view('cart')
        ->with('carts',$carts)
        ->with('totalWeight',$totalWeight)
        ->with('subTotal',$subTotal)
        ->with('totalPrice',$totalPrice);
    }

    public function addToCart(Request $request, $id)
    {

        $product = Products::findOrFail($id);
        $id = $product->id;
        $name = $product->product_name;
        $qty = $request->input('qty');
        $price = $product->product_price;
        $weight = $product->product_weight;

        $image_path = $product->product_photo;

        try
        {
            Cart::add($id, $name, $qty, $price ,$weight, ['image_path' => $image_path]);

        } catch (\Throwable $th) {

            return $th->getMessage();

        }

        $cart = Cart::content();

        // dd($cart);
        return redirect()->back()->with('alert', 'Items Added to Cart!');

    }

    public function updateCart(Request $request,$rowId)
    {
        // dd('a');
        $qty = $request->input('qty');
        // dd($qty);
        Cart::update($rowId, $qty);
        $cart = Cart::content();

        return redirect()->back()->with('alert', 'Cart Updated!');

    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('alert', 'Items Removed from Cart!');
    }
    public function emptyCart()
    {
        Cart::destroy();
        return redirect()->back()->with('alert', 'Items Removed from Cart!');

    }

    /**
         *
         * COUPON
         *
         */
        public function validateCoupon(Request $request)
        {
            // check if coupon exist
            $validator = Validator::make($request->all(),
            [
                'coupon_code' => 'exists:coupons',
            ]);

            if ($validator->fails())
            {
                return back()->withErrors($validator)->withInput();
            }

            $carts = Cart::content();
            $totalWeight = Cart::weight();
            $subTotal = Cart::subtotal();
            $totalPrice = Cart::total();
            $totalPrice = (int)$totalPrice;


            $applied_coupon_code = $request->coupon_code;
            // assuming only member can use coupon
            // retrieve member status

            $coupon = Coupon::where('coupon_code',$applied_coupon_code)->first();

            // $newsDetail = news::where('slug',$slug)->first();
            // $user = User::findOrFail(Auth::user()->id);
            // $user_level = $user->membership_level;
            // $coupon_level = $coupon->member_level;
            $message = '';
            $discount_flag = 0;

            // dd($user_level);

            if($coupon->is_active == 1)
            {
                // if(strcmp($user_level, $coupon_level)==0)
                // {
                    // elligible for coupon
                    // retrieve coupon discount
                    $coupon_discount_percent = $coupon->discount / 100; //percent
                    $coupon_discount_price = $coupon_discount_percent * $totalPrice; //discount value
                    $price_after_discount = $totalPrice - $coupon_discount_price; //cart total price after discount
                    $message = 'Congratulations! Coupon applied! Enjoy your discount!';

                    // make flag
                    // success flag
                    $discount_flag = 1;

                    // put into session
                    session()->put('coupon_discount_price',$coupon_discount_price); //discount value
                    session()->put('price_after_discount',$price_after_discount); //total price after discount
                    session()->put('discount_flag',$discount_flag);
                    session()->put('coupon_code_name',$coupon->coupon_code);
                // }

            }
            else if($coupon->is_active == 0)
            {
                // coupon exist but not active
                $message = 'Sorry, this coupon is no longer valid. ';
            }
            // else if(strcmp($user_level,$coupon_level)  != 0)
            // {

            //     $message = 'Sorry, you are not eligible for this coupon. ';
            // }
            else
            {
                $message = 'Sorry, this coupon is no longer valid. ';
            }

            session()->put('coupon_message',$message);


            // dd($discount_flag);
            return view('cart')
            ->with('carts',$carts)
            ->with('totalWeight',$totalWeight)
            ->with('subTotal',$subTotal)
            ->with('totalPrice',$totalPrice);


        }


    // profile
    public function editProfile($id)
    {
        $provinces = DB::table('provinces')->get();
        $cities = DB::table('cities')->get();
        $provinces = json_decode($provinces,true);
        $cities = json_decode($cities,true);



        $user = User::find($id);
        $user_province = $user->province;
        $user_city =  $user->city;
        $user_postal_code = $user->postal_code;


        $user_province_name = DB::table('provinces')->where('province_id','=',$user_province)->first();
        $user_city_name = DB::table('cities')->where('city_id','=',$user_city)->first();


        return view('editprofile',compact('cities','provinces','user' ,'user_postal_code','user_province_name','user_city_name'));
    }

    public function saveProfileData(Request $request, $id)
    {

        // save profile
        $validator = Validator::make($request->all(),
        [
            'firstname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        // dd($request->all());
        if ($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }


        $now = now();
        $user = User::find($id);
        $user->name = $request->firstname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->completed_profile = 1;

        $user->save();




        // send thank you for register
          // send invoice email
        //   $messageToName = Auth::user()->name;
        //   $messageToEmail = Auth::user()->email;

          try {
            //code...
            // $data = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail');

            // Mail::send('maileclipse::templates.thankYouForRegister', $data, function($message)
            // {
            //     $message->to($messageToEmail, $messageToName)->subject('Guele - Thank You For Register!');
            //     $message->from('noreply@guele.id','Guele');
            //     Log::info('thank you email has been sent to '.$messageToEmail);
            // });

            // dd('check email');


            // Mail::to($messageToEmail)->send(new WelcomeUser($user));s
            // Log::info('thank you registration email has been sent to '.$messageToEmail);


        } catch (\Throwable $th) {
            //throw $th;
            // echo $th->getMessage();
            Log::info($th->getMessage());
        }



        return back()->with('success', 'Congratulations! your profile has successfully been updated!');
    }

    public function memberLogout()
    {
        Auth::logout();
        // return view('');
        $products = Products::where('product_brand','Oh Ma Grain!')->get();
        $products2 = Products::where('product_brand','Rice n Shine')->get();

        $instagrams = Instagram::all();
        return view('index',compact('products','products2','instagrams'));
    }



    public function checkoutView(Request $request)
    {
        $provinces = DB::table('provinces')->get();
        $cities = DB::table('cities')->get();
        $provinces = json_decode($provinces,true);
        $cities = json_decode($cities,true);

        $carts = Cart::content();
        $totalPrice = Cart::total();

        $totalPrice = \intval($totalPrice);
        $totalWeight = Cart::weight();
        $subTotal = Cart::subtotal();
        $totalPrice = Cart::total();

        if(Auth::check())
        {
            $user = User::findOrFail(Auth::user()->id);
            $user_province = $user->province;
            $user_city =  $user->city;
            $user_postal_code = $user->postal_code;

            $user_province_name = DB::table('provinces')->where('province_id','=',$user_province)->first();
            $user_city_name = DB::table('cities')->where('city_id','=',$user_city)->first();
        }
        else
        {
            $user = '';
            $user_province = '';
            $user_city =  '';
            $user_postal_code = '';

            $user_province_name = '';
            $user_city_name = '';
        }




        return view('checkout',compact('carts','totalWeight','subTotal','provinces','cities','totalPrice','user','user_province_name','user_city_name'));
    }

    // calculate shipping
        public function storeBillingDetails(Request $request)
        {
            // dd($request->all());
            $strRand = str_random(6);
            $code = strtoupper($strRand);
            $orderId = 'INV-'.$code;

            session()->put('order_code',$orderId);


            /**
             * kalau customer login
             */

            if(Auth::check())
            {
                $customer_name = Auth::user()->name;
                $customer_phone = Auth::user()->phone;
                $customer_email = Auth::user()->email;
                $customer_province = Auth::user()->province;
                $customer_city = Auth::user()->city;
                $customer_postal_code = Auth::user()->postal_code;
                $customer_address = Auth::user()->address;

                $totalWeight = Cart::weight();
                $totalPrice = Cart::total();

                $delivery_courier = strtolower($request->delivery_courier);
                $delivery = $request->delivery_details;
                $city = $request->city;

                $data = \RajaOngkir::Cost([
                    'origin' 		=> 155, // id kota asal
                    'destination' 	=> $customer_city, // id kota tujuan
                    'weight' 		=> $totalWeight, // berat satuan gram
                    'courier' 		=> $delivery_courier, // kode kurir pengantar ( jne / tiki / pos )
                ])->get();


                $del_courier = $request->delivery_courier;
            }
            /**kalau customer tidak login */
            else
            {
                $validator = Validator::make($request->all(),
                [
                    'firstname' => 'required',
                    'province' => 'required',
                    'city' => 'required',
                    'postal_code' => 'required',
                    'delivery_courier' => 'required',
                    'delivery_details' => 'required',
                    'street_address' => 'required',
                    'phone' => 'required',
                    'email' => 'required',
                ]);

                if ($validator->fails())
                {

                    return back()->withErrors($validator)->withInput();
                }

                //   $order->customer_name = $request->firstname;
                //   $order->customer_phone = $request->phone;
                //   $order->customer_email = $request->email;
                //   $order->customer_address = $request->street_address;
                //   $order->province = $provinceName;
                //   $order->city = $cityName;
                //   $order->postal_code = $request->postal_code;
                //   $order->delivery_courier = $request->delivery_courier;
                //   $order->delivery_details = $request->delivery_details;

                $customer_name = $request->name;
                $customer_phone = $request->phone;
                $customer_email = $request->email;
                $customer_province = $request->province;
                $customer_city = $request->city;
                $customer_postal_code = $request->postal_code;
                $customer_address = $request->address;

                $totalWeight = Cart::weight();
                $totalPrice = Cart::total();

                $delivery_courier = strtolower($request->delivery_courier);
                $delivery = $request->delivery_details;
                $city = $request->city;

                $data = \RajaOngkir::Cost([
                    'origin' 		=> 155, // id kota asal
                    'destination' 	=> $city, // id kota tujuan
                    'weight' 		=> $totalWeight, // berat satuan gram
                    'courier' 		=> $delivery_courier, // kode kurir pengantar ( jne / tiki / pos )
                ])->get();


                $del_courier = $request->delivery_courier;
            }


                if($del_courier == 'JNE')
                {
                    $costsOKE = Arr::get($data, '0.costs.0.cost.0.value');//OKE
                    $costsREG = Arr::get($data, '0.costs.1.cost.0.value');//REG
                    $costsYES = Arr::get($data, '0.costs.2.cost.0.value');//YES
                }
                else if($del_courier == 'TIKI')
                {
                    $costsECO =  Arr::get($data, '0.costs.0.cost.0.value');//eco
                    $costsREGTIKI = Arr::get($data, '0.costs.1.cost.0.value');// reg
                    $costsONS =  Arr::get($data, '0.costs.2.cost.0.value');
                }

                // JNE
                if($delivery == 'OKE (Ongkos Kirim Ekonomis)')
                {
                    $SHIPPING_COST = $costsOKE;
                }
                else if($delivery == 'REG (Reguler)')
                {
                    $SHIPPING_COST = $costsREG;
                }
                else if($delivery == 'YES (Yakin Esok Sampai)')
                {
                    $SHIPPING_COST = $costsYES;
                }
                else if($delivery == 'ECO (Economy Service)')
                {
                    $SHIPPING_COST = $costsECO;
                }
                else if($delivery == 'REG (Regular Service)')
                {
                    $SHIPPING_COST = $costsREGTIKI;
                }
                else if($delivery == 'ONS (Over Night Service)')
                {
                    $SHIPPING_COST = $costsONS;
                }
                else
                {
                    $SHIPPING_COST = 'Cannot calculate for shipping cost';
                }

                if(is_null($SHIPPING_COST))
                {
                    return Redirect::back()->withErrors('We are sending our products from West Java.
                    Your locations might be too far ,Please try "REG" when choose Delivery Details');
                }
                else
                {
                    session()->put('shipping_cost',$SHIPPING_COST);
                }

                // $customer_name = $request->name;
                // $customer_phone = $request->phone;
                // $customer_email = $request->email;
                // $customer_province = $request->province;
                // $customer_city = $request->city;
                // $customer_postal_code = $request->postal_code;
                // $customer_address = $request->address;


                // Storing billing data to sessions
                session()->put('firstname',$customer_name);
                // session()->put('lastname',$request->lastname);

                // retrieve province name first then store into sessions
                $provinceName = Province::findOrFail($customer_province);
                $provinceName = $provinceName->province;
                session()->put('province',$provinceName);

                // retrieve city name first then store into sessions
                $cityName = City::findOrFail($customer_city);
                $cityName = $cityName->city_name;
                session()->put('city',$cityName);
                session()->put('postal_code',$customer_postal_code);
                session()->put('delivery_courier',$request->delivery_courier);
                session()->put('delivery_details',$request->delivery_details);
                session()->put('street_address',$customer_address);
                session()->put('phone',$customer_phone);
                session()->put('email',$customer_email);


                $shipping_cost = session()->get('shipping_cost');

                $carts = Cart::content();
                $totalWeight = Cart::weight();
                $totalPrice = Cart::total();
                $totalPrice = (int)$totalPrice;
                $finalPrice = $totalPrice + $shipping_cost;

                session()->put('final_price',$finalPrice);


                  // store order data to order
                  $now = now();
                  $order = new Order();

                  $order->order_unique_id = $orderId;
                  $order->order_status = 'NOT PAID';
                  $order->order_price = $finalPrice;
                  $order->order_date = $now;

                  $order->customer_id = Auth::user()->id;
                  $order->customer_name = $customer_name;
                  $order->customer_phone = $customer_phone;
                  $order->customer_email = $customer_email;
                  $order->customer_address = $customer_address;
                  $order->province = $provinceName;
                  $order->city = $cityName;
                  $order->postal_code = $customer_postal_code;
                  $order->delivery_courier = $request->delivery_courier;
                  $order->delivery_details = $request->delivery_details;

                //   $order->earned_points = $points;

                  $order->created_at = $now;
                  $order->updated_at = $now;

                  if($SHIPPING_COST == 'Cannot calculate for shipping cost')
                  {
                      $order->shipping_cost = 0;
                  }
                  else
                  {
                      $order->shipping_cost = $SHIPPING_COST;
                  }
                  $order->save();


                //   if(!Auth::check())
                //   {
                //       dd('user checkout but no login');
                //   }


                // guele
                $latestOrder = Order::orderBy('created_at','desc')->take(1)->first();
                $cartDetails = Cart::content();
                $cartTotalWeight = Cart::weight();



                $totalPrice = session()->get('final_price');


                // storing cart data to database

                $cartDetails = Cart::content();
                $cartTotalWeight = Cart::weight();
                $cartTotalPrice = Cart::total();
                $subTotal = Cart::subtotal();





                foreach($cartDetails as $cartDetail)
                {
                    $gueleCart = new OrderDetail;
                    $gueleCart->order_unique_id = $orderId;
                    $gueleCart->order_qty = $cartDetail->qty;
                    $gueleCart->order_item = $cartDetail->name;
                    $gueleCart->order_weight = $cartDetail->weight;
                    $gueleCart->save();
                }

                Log::info('data transaction added successfully');

                // dd

                // dd('hi');
                // dd($finalPrice);
                // if(session()->get('discount_flag') == 1)
                // {
                //     $finalPrice = $finalPrice - session()->get('price_after_discount');
                // }
                // session price after discount = 180000

                // dd(session()->get('price_after_discount'));

                return view('payment',compact('carts','totalWeight','totalPrice','finalPrice','shipping_cost','subTotal'));
        }

        public function paymentView()
        {
            // dd('hi');
            $carts = Cart::content();
            // $cartTotalWeight = Cart::weight();
            // $cartTotalPrice = Cart::total();
            $totalWeight = Cart::weight();
            $totalPrice = Cart::total();
            $subTotal = Cart::subtotal();
            $totalPrice = session()->get('final_price');
            $shipping_cost = 9000;
            $totalPrice = (int)$totalPrice;
            $finalPrice = $totalPrice + $shipping_cost;

            return view('payment',compact('carts','totalWeight','totalPrice','finalPrice','shipping_cost','subTotal'));
        }


        public function midtransPayment()
        {

            $orderId =  session()->get('order_code');
            $totalPrice =  session()->get('final_price');
            $firstName = session()->get('firstname');
            $email = session()->get('email');


            $phone = Auth::user()->phone;
            $address = Auth::user()->address;

            if(session()->get('discount_flag')==0)
            {
                $totalPrice = session()->get('final_price');
            }
            else if(session()->get('discount_flag')==1)
            {
                // session()->put('coupon_discount_price',$coupon_discount_price); //discount value
                $totalPrice = session()->get('final_price') - session()->get('coupon_discount_price');
            }

            // dd($totalPrice);

            //here
            //total_purchase (with discount, without shipping fee)
            session()->put('total_purchase_with_discount_without_shipping_fee',$totalPrice);


            $payload = [
                'transaction_details' =>
                [
                    'order_id'      => $orderId,
                    'gross_amount'  => $totalPrice,
                ],
                'customer_details' =>
                [
                    'first_name'    => $firstName,
                    'email'         => $email,
                    'phone'         => $phone,
                    'address'       => $address,
                ],
                'item_details' =>
                [
                    [
                        'id'       => $orderId,
                        'price'    => $totalPrice,
                        'quantity' => 1,
                        'name'     => $orderId
                    ]
                ]
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($payload);
            $this->response['snap_token'] = $snapToken;
            return response()->json($this->response);


        }

        public function thankYouPage()
        {


        if(Auth::check())
        {
            Cart::destroy();
            $user = User::findOrFail(Auth::user()->id);
            $now = now();

            $messageToName = Auth::user()->name;
            $messageToEmail = Auth::user()->email;

            Log::warning($user->name.' has completed purchase!');

            $user->save();




        $orders = DB::table('orders')->where('customer_id','=',Auth::user()->id)->where('order_status','=','NOT PAID')->orderBy('created_at', 'desc')->first();
        $orders = Order::where('customer_id',Auth::user()->id)
                        ->where('order_status','NOT PAID')
                        ->orderBy('created_at', 'desc')->first();
        $orders->order_status = 'PAID';
        $orders->save();

        }

        $messageToName = Auth::user()->name;
        $messageToEmail = Auth::user()->email;

        $orders = DB::table('orders')->where('customer_id','=',Auth::user()->id)->where('order_status','=','PAID')->orderBy('created_at', 'desc')->first();
        $order_details = OrderDetail::where('order_unique_id',$orders->order_unique_id);



            // send invoice email
            try
            {
                Mail::to($messageToEmail)->send(new InvoiceUser($orders,$order_details));
                Log::info('invoice email has been sent to '.$messageToEmail);
            }
            catch (\Throwable $th)
            {
                Log::info($th->getMessage());
            }





        // dd('thank you, payment success');
        return view('thankyou');
    }


    // view order
    public function viewMyOrder($id)
    {
        $id  = Auth::user()->id;
        $orders = Order::where('customer_id',$id)->where('order_status','PAID')->get();
        // dd($orders);
        return view('memberorder',compact('orders'));
    }

    public function viewInvoiceDetail($id)
    {
        $orderDetailById = OrderDetail::where('order_unique_id',$id)->get();
        $invoiceId = $id;
        return view('memberorderdetailbyid',compact('orderDetailById','invoiceId'));
    }









    // one time function only
    public function insertURL()
    {
        // $goals = DB::table('news')->select('id','title')->get();
        $goals = DB::table('products')->select('id','product_name')->get();
        $data = array();
        $data = $goals;

        foreach ($data as $d)
        {

            $data = \str_slug($d->product_name);

            DB::table('products')
                ->where('id',$d->id)
                ->update(
                    [
                        'product_slug' => $data
                    ]
                );

            // DB::table('product')
        }

        dd('check db products');




    }



    /**
     * ajax services
     *
     */

    public function getcities()
    {
        $province_id = Input::get('province_id');
        $cities = DB::table('cities')->where('province_id','=',$province_id)->get();
        return response()->json($cities);
    }

    public function getpostalcode()
    {
        $city_id = Input::get('city_id');
        $postal_code = DB::table('cities')->where('city_id','=',$city_id)->get();
        return response()->json($postal_code);
    }

    public function getcourierservice()
    {
        $courier = Input::get('courier_name');
        $services = DB::table('deliveries')->where('courier_name','=',$courier)->get();
        return response()->json($services);
    }


















}
