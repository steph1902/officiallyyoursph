<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use App\Models\Payment;
use Xendit\Invoice;
use Xendit\Xendit;



class PaymentController extends Controller
{

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
