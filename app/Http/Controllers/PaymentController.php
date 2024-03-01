<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use App\Models\Payment;


class PaymentController extends Controller
{
    var $apiInstance = null;

    public function __construct()
    {
        Configuration::setXenditKey("xnd_development_Gy7qL3gIVpGEjvoiingIFRw5YfD1Rnfc1NMdMpi3wqWDSw34NMGA4BtbbZUyhmn");
        $this->apiInstance = new InvoiceApi();
    }
    //
    public function createInvoice(Request $request)
    {
        

        $apiInstance = new InvoiceApi();

        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => 'test1234',
            'description' => 'Test Invoice',
            'amount' => 10000,
            'invoice_duration' => 172800,
            'currency' => 'PHP',
            'reminder_time' => 1
        ]);

        $for_user_id = "62efe4c33e45694d63f585f0"; // Business ID of the sub-account merchant (XP feature)

        try 
        {
            $result = $apiInstance->createInvoice($create_invoice_request, $for_user_id);
            return response()->json($result);
        } 
        catch (\Xendit\XenditSdkException $e) 
        {
            $errorMessage = 'Exception when calling InvoiceApi->createInvoice: ' . $e->getMessage();
            $fullError = 'Full Error: ' . json_encode($e->getFullError());
            return response()->json([$errorMessage, $fullError], 500);
        }


        $payment = new Payment();
        $payment->status = 'pending';
        $payment->checkout_link = $result['invoice_url'];
        $payment->external_id = $create_invoice_request['external_id'];
        $payment->save();

        return response()->json($payment);

    }
}
