<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
// use Illuminate\Http\Request;
use App\Models\Partnership;
use Auth;


class CollectionsController extends Controller
{

    // 

    public function checkoutPage()
    {
        $carts = Cart::content();
        $subTotalString = Cart::subtotal(); // Get the subtotal as a string
        $subTotalString = str_replace(['₱', ','], '', $subTotalString); // Remove currency symbol and commas
        $subTotal = (int) $subTotalString; // Convert to integer
        return view('checkoutPage',compact('carts','subTotal'));
    }

    public function storeMyAccountAddress(Request $request)
    {
        $request->validate([
            'street_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->address = $request->street_address;
        $user->phone_number = $request->phone_number;
        $user->save();

        return redirect()->back()->with('alert', 'Data successfully updated!');

    }

    // public function indexView()
    // {
        // $instagrams = DB::table('instagram_embeds')->get();
        // return view('welcome',compact('instagrams'));
    // }

    // my account

    public function invoiceView($id)
    {
        $orders = DB::table('invoices')->where('invoices.external_id',$id)->first();
        $orderDetails = DB::table('invoice_details')->where('invoice_details.invoice_id',$id)->get();

        // dd($orders->user_id);
        $userId = $orders->user_id;
        $userInfo = DB::table('users')->where('id',$userId)->first();
        // dd($userInfo);
        // dd($orderDetails);
        return view('downloadableinvoice',compact('orders','orderDetails','userInfo'));
    }

    public function addressEditForm()
    {
        return view('homesettingaddress');
    }

    public function orderSummary()
    {
        $userId = Auth::user()->id;
        $orders = DB::table('invoices')->where('invoices.user_id',$userId)->get();
        // dd($orders);


        // $product = DB::table('products')
        // ->join('color_variants', 'products.id', '=', 'color_variants.product_id')
        // ->join('product_images', 'color_variants.id', '=', 'product_images.product_color_variants_id')
        // ->join('size_chart', 'products.id', '=', 'size_chart.product_id')
        // ->join('size_details', 'size_chart.id', '=', 'size_details.id_size_chart')
        // ->select(
        //     'products.id AS product_id',
        //     'products.name AS product_name',
        //     'products.description AS product_description',
        //     'products.price',
        //     'products.product_image',
        //     'products.category',
        //     'products.brand',
        //     'products.status AS product_status',
        //     'color_variants.id AS color_variant_id',
        //     'color_variants.name AS color_variant_name',
        //     'color_variants.code AS color_variant_code',
        //     'color_variants.description AS color_variant_description',
        //     'product_images.image_path AS product_image_path',
        //     'size_chart.size_name',
        //     'size_details.bust',
        //     'size_details.waist',
        //     'size_details.hips',
        //     'size_details.length',
        //     'size_details.side_slit_length'
        // )
        // ->where('products.id', $id)
        // ->first();

        return view('homeordersummary',compact('orders'));
    }

    // my account



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


        // 
        $product = DB::table('products')
        ->join('color_variants', 'products.id', '=', 'color_variants.product_id')
        ->join('product_images', 'color_variants.id', '=', 'product_images.product_color_variants_id')
        ->join('size_chart', 'products.id', '=', 'size_chart.product_id')
        ->join('size_details', 'size_chart.id', '=', 'size_details.id_size_chart')
        ->select(
            'products.id AS product_id',
            'products.name AS product_name',
            'products.description AS product_description',
            'products.price',
            'products.product_image',
            'products.category',
            'products.brand',
            'products.status AS product_status',
            'color_variants.id AS color_variant_id',
            'color_variants.name AS color_variant_name',
            'color_variants.code AS color_variant_code',
            'color_variants.description AS color_variant_description',
            'product_images.image_path AS product_image_path',
            'size_chart.size_name',
            'size_details.bust',
            'size_details.waist',
            'size_details.hips',
            'size_details.length',
            'size_details.side_slit_length'
        )
        ->where('products.id', $id)
        ->first();

        // 


        // $product = Products::findOrFail($id);
        $id = $product->product_id;
        $name = $product->product_name;
        $qty = 1;
        $price = $product->price;
        $weight = 200;
        $image_path = $product->product_image;

        $size = $request->input('size');
        $color = $request->input('color');

        try
        {
            Cart::add($id, $name, $qty, $price ,$weight, ['image_path' => $image_path, 'size' => $size , 'color' => $color]);

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

    // cart








    public function ComingSoonView()
    {
        return view('comingsoon');
    }
    public function ShippingView()
    {
        return view('shippinganddelivery');
    }
    public function ContactView()
    {
        return view('contactus');
    }


    public function storePartnershipData(Request $request)
    {

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        $partnership = Partnership::create($validatedData);
    
        return back()->with('success', 'Partnership form submitted successfully');


    }



    //
    public function view()
    {
        $products = DB::table('products')->get();
        return view('collections',compact('products'));
    }

    public function bestSellerView()
    {
        $products = DB::table('products')->get();
        return view('bestsellers',compact('products'));
    }

    public function newInView()
    {
        $products = DB::table('products')->get();
        return view('newin',compact('products'));
    }

    public function promotionsView()
    {
        return view('promotions');   
    }

    public function partnershipView()
    {
        return view('partnership');
    }


    public function viewDetail($productId)
    {

        // $singleProduct = DB::table('products')


        $productDetail = DB::table('products')
            ->join('color_variants', 'products.id', '=', 'color_variants.product_id')
            ->join('product_images', 'color_variants.id', '=', 'product_images.product_color_variants_id')
            ->join('size_chart', 'products.id', '=', 'size_chart.product_id')
            ->join('size_details', 'size_chart.id', '=', 'size_details.id_size_chart')
            ->select(
                'products.id AS product_id',
                'products.name AS product_name',
                'products.description AS product_description',
                'products.price',
                'products.product_image',
                'products.category',
                'products.brand',
                'products.status AS product_status',
                'color_variants.id AS color_variant_id',
                'color_variants.name AS color_variant_name',
                'color_variants.code AS color_variant_code',
                'color_variants.description AS color_variant_description',
                'product_images.image_path AS product_image_path',
                'size_chart.size_name',
                'size_details.bust',
                'size_details.waist',
                'size_details.hips',
                'size_details.length',
                'size_details.side_slit_length'
            )
            ->where('products.id', $productId)
            ->first();

            $productImages = DB::table('product_images')
            ->join('color_variants', 'product_images.product_color_variants_id', '=', 'color_variants.id')
            ->join('products', 'color_variants.product_id', '=', 'products.id')
            ->select('product_images.image_path')
            ->where('products.id', $productId)
            ->limit(6)
            ->get();

            $allproducts = DB::table('products')->get();

            // dd($productDetail);

            // 
            // Query to join products and size_chart tables based on product_id
        $productsWithSizes = DB::table('products')
        ->join('size_chart', 'products.id', '=', 'size_chart.product_id')
        ->select('products.id', 'products.name', 'products.description', 'products.price', 'products.product_image', 'products.category', 'products.brand', 'products.status', 'products.created_at', 'products.updated_at', 'size_chart.size_name')
        ->where('products.id', $productId)
        ->get();

        $productsWithColors = DB::table('products')
            ->join('color_variants', 'products.id', '=', 'color_variants.product_id')
            ->where('products.id', '=', $productId)
            ->select('products.id', 'products.name', 'products.description', 'products.price', 'products.product_image', 'products.category', 'products.brand', 'products.status', 'products.created_at', 'products.updated_at', 'color_variants.id as color_id', 'color_variants.name', 'color_variants.code', 'color_variants.description', 'color_variants.created_at as color_created_at', 'color_variants.updated_at as color_updated_at')
            ->get();

        $productSizeChart = DB::table('products')
        ->select(
            'products.id',
            'products.name',
            'products.description',
            'products.price',
            'products.product_image',
            'products.category',
            'products.brand',
            'products.status',
            'products.created_at',
            'products.updated_at',
            'size_chart.size_name',
            'size_details.id_size_chart',
            'size_details.bust',
            'size_details.waist',
            'size_details.hips',
            'size_details.length',
            'size_details.side_slit_length'
        )
        ->join('size_chart', 'products.id', '=', 'size_chart.product_id')
        ->join('size_details', 'size_chart.id', '=', 'size_details.id_size_chart')
        ->where('products.id', $productId)
        ->get();

        // dd($productSizeChart);


        // dd($productsWithColors);
        // 0 => {#331 ▼
        //     +"id": 2
        //     +"name": "Black"
        //     +"description": "n/a"
        //     +"price": 4000
        //     +"product_image": "Kleita Official/Rose Ruffle Dress/Black/1.jpg"
        //     +"category": "Dress"
        //     +"brand": "Kleita Official"
        //     +"status": "Active"
        //     +"created_at": null
        //     +"updated_at": null
        //     +"color_id": 4
        //     +"code": "n/a"
        //     +"color_created_at": null
        //     +"color_updated_at": null

        return view('productdetail', compact('productDetail','productImages','allproducts','productsWithSizes','productsWithColors','productSizeChart'));
    }
}
