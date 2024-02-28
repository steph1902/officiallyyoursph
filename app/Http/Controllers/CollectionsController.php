<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;


class CollectionsController extends Controller
{

    // public function indexView()
    // {
        // $instagrams = DB::table('instagram_embeds')->get();
        // return view('welcome',compact('instagrams'));
    // }



    //
    public function view()
    {
        $products = DB::table('products')->get();
        return view('collections',compact('products'));
    }

    public function viewDetail($productId)
    {
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

        return view('productdetail', compact('productDetail','productImages','allproducts'));
    }
}
