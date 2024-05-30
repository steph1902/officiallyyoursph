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

        $shipping_cost = $request->input('shipping_cost');


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
                'shipping_cost' => $shipping_cost,
                'xendit_user_id' => $responseData['user_id'],
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
            // return redirect()->back()->with('invoice_url', $invoiceUrl);
            return redirect()->back()->with([
                'invoice_url' => $invoiceUrl,
                'message' => 'Invoice successfully created. Please proceed to payment.'
            ]);
            

        } 
        catch (\Xendit\XenditSdkException $e){
            return response()->json(['message' => 'Exception when calling InvoiceApi->createInvoice: '. $e->getMessage(), 'full_error' => $e->getFullError()], 500);
        }
    }


    // public function getInvoices()
    // {
    //     $invoice_id = '6634752da7f5d303d7b74541';
    //     $for_user_id = null;
    //     // $invoice = getInvoiceByIdRequest($invoice_id, $for_user_id);
    //     // dd($invoice);


    //     Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    //     $apiInstance = new InvoiceApi();

    //     $request = $apiInstance->getInvoiceByIdRequest($invoice_id, $for_user_id);
    //     $client = new \GuzzleHttp\Client();
    //     $response = $client->send($request);
    //     $responseData = json_decode($response->getBody()->getContents(), true);

    //     dd($responseData);
    // }

    // 

    /**
     * Operation getInvoices
     *
     * Get all Invoices
     *
     * @param  string $for_user_id Business ID of the sub-account merchant (XP feature) (optional)
     * @param  string $external_id external_id (optional)
     * @param  \Invoice\InvoiceStatus[] $statuses statuses (optional)
     * @param  float $limit limit (optional)
     * @param  \DateTime $created_after created_after (optional)
     * @param  \DateTime $created_before created_before (optional)
     * @param  \DateTime $paid_after paid_after (optional)
     * @param  \DateTime $paid_before paid_before (optional)
     * @param  \DateTime $expired_after expired_after (optional)
     * @param  \DateTime $expired_before expired_before (optional)
     * @param  string $last_invoice last_invoice (optional)
     * @param  \Invoice\InvoiceClientType[] $client_types client_types (optional)
     * @param  string[] $payment_channels payment_channels (optional)
     * @param  string $on_demand_link on_demand_link (optional)
     * @param  string $recurring_payment_id recurring_payment_id (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvoices'] to see the possible values for this operation
     *
     * @throws \Xendit\XenditSdkException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Xendit\Invoice\Invoice[]
     */
    public function getInvoices(Request $request)
    {
        Configuration::setXenditKey("YOUR_API_KEY_HERE");

        $apiInstance = new InvoiceApi();
        $for_user_id = $request->input('for_user_id', null);
        $external_id = $request->input('external_id', null);
        $statuses = $request->input('statuses', null);
        $limit = $request->input('limit', null);
        $created_after = $request->input('created_after', null);
        $created_before = $request->input('created_before', null);
        $paid_after = $request->input('paid_after', null);
        $paid_before = $request->input('paid_before', null);
        $expired_after = $request->input('expired_after', null);
        $expired_before = $request->input('expired_before', null);
        $last_invoice = $request->input('last_invoice', null);
        $client_types = $request->input('client_types', null);
        $payment_channels = $request->input('payment_channels', null);
        $on_demand_link = $request->input('on_demand_link', null);
        $recurring_payment_id = $request->input('recurring_payment_id', null);
        $contentType = InvoiceApi::contentTypes['getInvoices'][0];

        try {
            $result = $apiInstance->getInvoices(
                $for_user_id,
                $external_id,
                $statuses,
                $limit,
                $created_after,
                $created_before,
                $paid_after,
                $paid_before,
                $expired_after,
                $expired_before,
                $last_invoice,
                $client_types,
                $payment_channels,
                $on_demand_link,
                $recurring_payment_id,
                $contentType
            );
            return response()->json($result);
        } catch (\Xendit\XenditSdkException $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'full_error' => $e->getFullError()
            ], 500);
        }
    }

    // 





}
