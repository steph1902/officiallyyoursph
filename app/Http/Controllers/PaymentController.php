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

    public function createInvoice(Request $request)
    {    
        $for_user_id = ''; 
        $contentType = 'application/json';

        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $apiInstance = new InvoiceApi();

        // 

        $randomNumber = Str::random(5);

        $external_id = strtoupper('INVOICE-' . $randomNumber);
        $total = $request->input('total');
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


            $invoiceUrl = $responseData['invoice_url'];
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
