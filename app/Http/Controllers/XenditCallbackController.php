<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class XenditCallbackController extends Controller
{
    //
    public function handle(Request $request)
    {
        $xenditXCallbackToken = env('XENDIT_CALLBACK_TOKEN');
        
        $xIncomingCallbackTokenHeader = $request->header('x-callback-token');

        if ($xIncomingCallbackTokenHeader !== $xenditXCallbackToken) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $callbackData = $request->all();

        // Lakukan logika bisnis Anda di sini. Contoh:
        $_id = $callbackData['id'];
        $_externalId = $callbackData['external_id'];
        $_userId = $callbackData['user_id'];
        $_status = $callbackData['status'];
        $_paidAmount = $callbackData['paid_amount'];
        $_paidAt = $callbackData['paid_at'];
        $_paymentChannel = $callbackData['payment_channel'];
        $_paymentDestination = $callbackData['payment_destination'];

        // Anda bisa melakukan apa saja dengan data ini, misalnya menyimpan ke database atau memproses pesanan.

        // Untuk sekarang, kita akan log data callback untuk debugging
        \Log::info('Callback received successfully');
        \Log::info('Xendit Callback Data:', $callbackData);

        return response()->json(['message' => 'Callback received successfully'], 200);
    }
}
