<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CollectionsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     // Ambil query dari tabel 'products'
     $products = DB::table('products')->get();
     $instagrams = DB::table('instagram_embeds')->get();
    return view('welcome',compact('products','instagrams'));
});


Route::get('collections', [CollectionsController::class, 'view'])->name('collection-view');
Route::get('product-detail/{id}', [CollectionsController::class, 'viewDetail'])->name('product-detail-view');

Route::get('about', [CollectionsController::class, 'view'])->name('collection-view');


Route::get('about-us', function () {
    // Ambil query dari tabel 'products'
    // $products = DB::table('products')->get();
    return view('aboutus');
//    return view('welcome',compact('products'));
});
