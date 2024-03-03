<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\PaymentController;


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
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);



Route::post("/payments",[PaymentController::class,'createInvoice'])->withoutMiddleware(['csrf']);
// Route::post('/create-invoice', 'PaymentController@createInvoice')->withoutMiddleware(['csrf']);




Route::get('/', function () {
     // Ambil query dari tabel 'products'
     $products = DB::table('products')->get();
     $instagrams = DB::table('instagram_embeds')->get();
    return view('welcome',compact('products','instagrams'));
});


Route::get('collections', [CollectionsController::class, 'view'])->name('collection-view');
Route::get('product-detail/{id}', [CollectionsController::class, 'viewDetail'])->name('product-detail-view');

Route::get('best-sellers', [CollectionsController::class, 'bestSellerView'])->name('best-seller-view');
Route::get('new-in', [CollectionsController::class, 'newInView'])->name('new-in-view');

Route::get('promotions', [CollectionsController::class, 'promotionsView'])->name('promotions-view');

Route::get('partnership', [CollectionsController::class, 'partnershipView'])->name('partnership-view');
Route::post('store-partnership-data', [CollectionsController::class, 'storePartnershipData'])->name('post-store-partnership-data');


Route::get('faq', function () {
    return view('faq');
});

Route::get('about-us', function () {
    return view('aboutus');
});

Route::get('return-and-exchange', function () {
    return view('returnandexchange');
});



Route::get('coming-soon',[CollectionsController::class, 'ComingSoonView'])->name('coming-soon-view');
Route::get('shipping-and-delivery',[CollectionsController::class, 'ShippingView'])->name('shipping-view');
Route::get('contact-us',[CollectionsController::class, 'ContactView'])->name('contact-view');

// Route::get('about', [CollectionsController::class, 'view'])->name('collection-view');



// cart
// Route::get('shopping-cart','FrontendController@cartView');
Route::get('shopping-cart', [CollectionsController::class, 'cartView'])->name('shopping-cart-view');
Route::post('add-to-cart/{id}', [CollectionsController::class, 'addToCart'])->name('add-to-cart');
Route::get('remove-cart/{id}',[CollectionsController::class, 'removeCart'])->name('remove-cart');



Route::get('about-us', function () {
    return view('aboutus');
});
