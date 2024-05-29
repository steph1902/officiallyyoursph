<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use App\Models\Payment;
use Xendit\Invoice;
use Xendit\Xendit;

use App\Models\InvoiceTable;
use App\Models\InvoiceDetailTable;

use Illuminate\Support\Str;
use Auth;
use Cart;




class PaymentController extends Controller
{




    public function storeInvoice(Request $request)
    {
        // Ambil data dari request atau response API
        $response = $request->all(); // Anda dapat mengganti ini dengan cara lain untuk mendapatkan data
        // dd($response);

        // Membuat invoice
        $invoice = Invoice::create([
            'external_id' => $response['external_id'],
            'user_id' => $response['user_id'],
            'status' => $response['status'],
            'merchant_name' => $response['merchant_name'],
            'amount' => $response['amount'],
            'description' => $response['description'],
            'expiry_date' => $response['expiry_date'],
            'invoice_url' => $response['invoice_url'],
            'should_exclude_credit_card' => $response['should_exclude_credit_card'],
            'should_send_email' => $response['should_send_email'],
            'currency' => $response['currency'],
            'reminder_date' => $response['reminder_date'],
        ]);

        // Membuat invoice detail
        $carts = Cart::content();
        foreach ($carts as $c) {
            InvoiceDetail::create([
                'invoice_id' => $invoice->id,
                'customer_id' => auth()->id(),
                'product_name' => $c->name,
                'product_price' => $c->price,
                'product_image' => $c->options->image, // Ubah sesuai kolom yang benar
                'product_size' => $c->options->size,
                'product_color' => $c->options->color,
            ]);
        }

        return response()->json(['message' => 'Invoice created successfully'], 200);
    }

    public function createInvoice(Request $request)
    {    
        $for_user_id = ''; 
        $contentType = 'application/json';

        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $apiInstance = new InvoiceApi();

        // 

        $randomNumber = Str::random(5);

        $external_id = strtoupper('INVOICE-' . $randomNumber);

        // $description = 'INVOICE-' . $randomNumber;
        $total = $request->input('total');
        // $amount = ;
        $userId = Auth::user()->id;
        


        // 

        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => $external_id,
            'description' => $external_id,
            'amount' => $total,
            'invoice_duration' => 172800,
            'currency' => 'PHP',
            'reminder_time' => 1
        ]);

        try {            

            $request = $apiInstance->createInvoiceRequest($create_invoice_request, $for_user_id, $contentType);
            $client = new \GuzzleHttp\Client();
            $response = $client->send($request);
            $responseData = json_decode($response->getBody()->getContents(), true);


            // storing data

            $invoice = InvoiceTable::create([
                'external_id' => $responseData['external_id'],
                'user_id' => $userId,
                'status' => $responseData['status'],
                'merchant_name' => $responseData['merchant_name'],
                'merchant_profile_picture_url' => $responseData['merchant_profile_picture_url'],
                'amount' => $responseData['amount'],
                'description' => $responseData['description'],
                // 'expiry_date' => $responseData['expiry_date'],
                'invoice_url' => $responseData['invoice_url'],
                'should_exclude_credit_card' => $responseData['should_exclude_credit_card'],
                'should_send_email' => $responseData['should_send_email'],
                'currency' => $responseData['currency'],
                // 'reminder_date' => $responseData['reminder_date'],
            ]);

            // Membuat invoice detail
            $carts = Cart::content();
            foreach ($carts as $c) {
                InvoiceDetailTable::create([
                    'invoice_id' => $external_id,
                    'customer_id' => $userId,
                    'product_name' => $c->name,
                    'product_price' => $c->price,
                    'product_image' => $c->options->image, // Ubah sesuai kolom yang benar
                    'product_size' => $c->options->size,
                    'product_color' => $c->options->color,
                ]);
            }


//               #items: array:2 [▼
//     "898446e4a0703aec66029eb82e8825bf" => Gloudemans\Shoppingcart\CartItem {#370 ▼
//         +rowId: "898446e4a0703aec66029eb82e8825bf"
//         +id: 1
//         +qty: 1
//         +name: "Adeline Dress"
//         +price: 3900.0
//         +weight: 200.0
//         +options: Gloudemans\Shoppingcart\CartItemOptions {#371 ▶}
//         +taxRate: 0
//         -associatedModel: null
//         -discountRate: 0
//         +instance: "default"
//       }
//       "b52aa74387de70e574907f6f2a86508a" => Gloudemans\Shoppingcart\CartItem {#372 ▶}
//     ]
//     #escapeWhenCastingToString: false
//   }


// id
// invoice_id
// customer_id
// product_name
// product_price
// product_image
// product_size
// product_color
// created_at
// updated_at

// tabel
// id
// external_id
// user_id
// status
// merchant_name
// merchant_profile_picture_url
// amount
// description
// expiry_date
// invoice_url
// should_exclude_credit_card
// should_send_email
// created_at
// updated_at
// currency
// reminder_date
// metadata

// 
// array:23 [▼
//   "id" => "6656ceb7bc26899c04fc1e48"
//   "external_id" => "INVOICE-qcMDG"
//   "user_id" => "65e079f7002c6305961d82b6"
//   "status" => "PENDING"
//   "merchant_name" => "Officially Yours Phillipines"
//   "merchant_profile_picture_url" => "https://xnd-merchant-logos.s3.amazonaws.com/business/production/65e079f7002c6305961d82b6-1709284182329.jpeg"
//   "amount" => 8078
//   "description" => "INVOICE-qcMDG"
//   "expiry_date" => "2024-05-31T06:44:07.615Z"
//   "invoice_url" => "https://checkout-staging.xendit.co/v2/6656ceb7bc26899c04fc1e48"
//   "available_banks" => []
//   "available_retail_outlets" => array:6 [▶]
//   "available_ewallets" => array:4 [▶]
//   "available_qr_codes" => []
//   "available_direct_debits" => array:20 [▶]
//   "available_paylaters" => array:2 [▶]
//   "should_exclude_credit_card" => false
//   "should_send_email" => false
//   "created" => "2024-05-29T06:44:07.740Z"
//   "updated" => "2024-05-29T06:44:07.740Z"
//   "currency" => "PHP"
//   "reminder_date" => "2024-05-30T06:44:07.615Z"
//   "metadata" => null
// ]



            // storing data

            // dd($responseData);
            

            // dd($responseData['invoice_url']);

            // Create a new Payment instance and save it to the database
            // $payment = new Payment();
            // $payment->invoice_url = $responseData['invoice_url'];
            // $payment->save();

            $invoiceUrl = $responseData['invoice_url'];



            // return response()->json(['message' => 'Invoice created successfully', 'data' => $responseData]);
            return redirect()->back()->with('invoice_url', $invoiceUrl);

        } 
        catch (\Xendit\XenditSdkException $e){
            return response()->json(['message' => 'Exception when calling InvoiceApi->createInvoice: '. $e->getMessage(), 'full_error' => $e->getFullError()], 500);
        }
    }


    public function getInvoices()
    {
        $invoice_id = '6634752da7f5d303d7b74541';
        $for_user_id = null;
        // $invoice = getInvoiceByIdRequest($invoice_id, $for_user_id);
        // dd($invoice);


        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $apiInstance = new InvoiceApi();

        $request = $apiInstance->getInvoiceByIdRequest($invoice_id, $for_user_id);
        $client = new \GuzzleHttp\Client();
        $response = $client->send($request);
        $responseData = json_decode($response->getBody()->getContents(), true);

        dd($responseData);




    }




}
