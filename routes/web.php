<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CollectionsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingController;


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


// use Illuminate\Support\Facades\Mail;
// use App\Mail\TestEmail;

// Route::get('/send-test-email', function () {
//     $toEmail = 'your_email_address@example.com';
//     $fromEmail = '';
//     $subject = 'Test Email';

//     Mail::to($toEmail)->send(new TestEmail($subject, $fromEmail));

//     return 'Test email sent successfully!';
// });






Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);



// Route::get("/payments",[PaymentController::class,'createInvoice'])->withoutMiddleware(['csrf']);
Route::get('test-payment', [PaymentController::class, 'createInvoice']);
Route::get('test-get-invoices', [PaymentController::class, 'getInvoices']);
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('my-account/address', [CollectionsController::class, 'addressEditForm'])->name('my-account-address');

#todo
// Route::post('store-my-account-address', [CollectionsController::class, 'storeMyAccountAddress'])->name('store-my-account-address');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('my-account/order-summary', [CollectionsController::class, 'orderSummary'])->name('my-account-order-summary');


// {{ 'my-account/address' }}

// 3522 Honda, Makati, 1213 Metro Manila, Philippines



// Route::post('calculate-shipping-cost', 'ShippingController@calculateShippingCost');
// Route::get('my-account/order-summary', [CollectionsController::class, 'orderSummary'])->name('my-account-order-summary');
Route::get('/shipping-cost', function () {
    return view('testcalculateshippingcost');
  })->name('shipping-cost-form');


Route::get('calculate-shipping-cost', [ShippingController::class, 'getQuotation'])->name('calculate-shipping-cost');

// https://www.blackbox.ai/share/43f4c29d-e24b-4c1e-bf48-5ada15b96546


// lalamove laravel
// https://www.blackbox.ai/share/83251055-09f1-4fbe-b00f-1311cb16a64d


// https://github.com/lalamove/api-examples/tree/master/php

// https://github.com/lalamove/api-examples/blob/master/php/quotation-v3.php


// https://github.com/xendit/xendit-php/blob/master/docs/InvoiceApi.md

// https://github.com/xendit/checkout-demo-laravel/blob/main/app/Http/Services/Checkout/CheckoutService.php

// https://docs.xendit.co/id/tokenization-with-payments-api
// https://js.xendit.co/test_payment_methods.html
// https://docs.xendit.co/id/api-payouts-beta/activation



// https://docs.xendit.co/payment-link/integration-and-testing/payment-links-integration
// https://developers.xendit.co/api-reference/#create-invoice