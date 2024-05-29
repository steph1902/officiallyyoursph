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




class PaymentController extends Controller
{




    public function storeInvoice(Request $request)
    {
        // Ambil data dari request atau response API
        $response = $request->all(); // Anda dapat mengganti ini dengan cara lain untuk mendapatkan data

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

    public function createInvoice()
    {
        $for_user_id = ''; 
        $contentType = 'application/json';

        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $apiInstance = new InvoiceApi();

        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => 'test1234',
            'description' => 'Test Invoice',
            'amount' => 10000,
            'invoice_duration' => 172800,
            'currency' => 'PHP',
            'reminder_time' => 1
        ]);

        try {            

            $request = $apiInstance->createInvoiceRequest($create_invoice_request, $for_user_id, $contentType);
            $client = new \GuzzleHttp\Client();
            $response = $client->send($request);
            $responseData = json_decode($response->getBody()->getContents(), true);

            dd($responseData);
            

            // dd($responseData['invoice_url']);

            // Create a new Payment instance and save it to the database
            // $payment = new Payment();
            // $payment->invoice_url = $responseData['invoice_url'];
            // $payment->save();



            return response()->json(['message' => 'Invoice created successfully', 'data' => $responseData]);
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
