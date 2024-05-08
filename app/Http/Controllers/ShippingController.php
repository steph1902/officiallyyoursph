<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Factory;
use Carbon\Carbon;



class ShippingController extends Controller
{


  public function getQuotation()
  {
      // dd('hel');


    //   

    

    // Get current time
    $currentDateTime = Carbon::now();

    // Add 3 hours
    $futureDateTime = $currentDateTime->addHours(3);

    // Format the datetime in ISO 8601 format
    $formattedDateTime = $futureDateTime->toIso8601String();

    // dd($formattedDateTime);
    // "2024-04-16T05:31:47+00:00"
    // 2024-04-16T11:19:45.106Z
    // 2024-04-15T10:19:45.106Z
    



    // 

        $key = env('LALAMOVE_KEY'); 
        $secret = env('LALAMOVE_SECRET_KEY');   
        // $key = env('LALAMOVE_SECRET_KEY');        

        $time = time() * 1000;

        $baseURL = 'https://rest.sandbox.lalamove.com'; // URL to Lalamove Sandbox API
        $method = 'POST';
        $path = '/v3/quotations';
        $region = 'SG';

        $body = '{
            "data" : {
                "scheduleAt": "2024-04-16T11:19:45.106Z",
                "serviceType": "MOTORCYCLE",
                "specialRequests": [],
                "language": "en_SG",
                "stops": [
                {
                    "coordinates": {
                        "lat": "1.326410",
                        "lng": "103.896333"
                    },
                    "address": "10 Ubi Crescent, Ubi Techpark Lobby C, #04-35, Singapore 408564"
                },
                {
                    "coordinates": {
                        "lat": "1.334584",
                        "lng": "103.962226"
                    },
                    "address": "5 Changi Business Park Central 1, Singapore 486038"
                }],
                "isRouteOptimized": true
            }  
        }';

        // dd($body);

        $rawSignature = "{$time}\r\n{$method}\r\n{$path}\r\n\r\n{$body}";
        $signature = hash_hmac("sha256", $rawSignature, $secret);
        $startTime = microtime(true);
        $token = $key.':'.$time.':'.$signature;

        $response = Http::withHeaders([
            'Content-type' => 'application/json; charset=utf-8',
            'Authorization' => 'hmac '.$token,
            'Accept' => 'application/json',
            'Market' => $region,
        ])->post($baseURL.$path, [
            'data' => json_decode($body, true),
        ]);

        // dd($response);

        $httpCode = $response->status();
        $data = $response->json();

        echo 'Request body: ' . $body . PHP_EOL;
        echo '<br>';echo '<br>';echo '<br>';
echo 'Request headers: ' . PHP_EOL;
echo '<br>';echo '<br>';echo '<br>';
foreach ($response as $name => $value) {
    echo $name . ': ' . $value . PHP_EOL;
}

        echo 'Total elapsed http request/response time in milliseconds: '.floor((microtime(true) - $startTime)*1000)."\r\n";
        echo '<br>';
        echo 'Authorization: hmac '.$token."\r\n";
        echo '<br>';
        echo 'Status Code: '.$httpCode."\r\n";
        echo '<br>';
        echo 'Returned data: ';
        echo '<br>';
        print_r($data);
    }




}
