<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Factory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;




class ShippingController extends Controller
{

    public function getQuotationX(Request $request)
    {
        $key = env('LALAMOVE_KEY');
        $secret = env('LALAMOVE_SECRET_KEY');
        $baseURL = env('LALAMOVE_BASE_URL');
        $region = env('LALAMOVE_REGION');
        $method = 'POST';
        $path = '/v3/quotations';
        $time = time() * 1000;

        $body = [
            'data' => [
                'serviceType' => 'MOTORCYCLE',
                'specialRequests' => [],
                'language' => 'en_SG',
                'stops' => [
                    [
                        'coordinates' => [
                            'lat' => '1.3140113',
                            'lng' => '103.8807331'
                        ],
                        'address' => 'Lorong 23 Geylang, Singapore Badminton Hall, Singapore'
                    ],
                    [
                        'coordinates' => [
                            'lat' => '1.2966147',
                            'lng' => '103.8485095'
                        ],
                        'address' => 'Stamford Road, National Museum of Singapore, Singapore'
                    ]
                ]
            ]
        ];

        $rawSignature = "{$time}\r\n{$method}\r\n{$path}\r\n\r\n" . json_encode($body);
        $signature = hash_hmac("sha256", $rawSignature, $secret);
        $token = $key . ':' . $time . ':' . $signature;

        $startTime = microtime(true);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'hmac ' . $token,
            'Accept' => 'application/json',
            'Market' => $region
        ])->post($baseURL . $path, $body);

        $httpCode = $response->status();
        $responseData = $response->body();

        $elapsedTime = floor((microtime(true) - $startTime) * 1000);

        return response()->json([
            'elapsed_time_ms' => $elapsedTime,
            'authorization' => 'hmac ' . $token,
            'status_code' => $httpCode,
            'response_data' => $responseData
        ]);
    }

    public function getQuotationxx(Request $request)
    {
        $key = env('LALAMOVE_KEY');
        $secret = env('LALAMOVE_SECRET_KEY');
        $baseURL = env('LALAMOVE_BASE_URL');
        $region = env('LALAMOVE_REGION');
        $method = 'POST';
        $path = '/v3/quotations';
        $time = time() * 1000;

        $body = [
            'data' => [
                'serviceType' => 'MOTORCYCLE',
                'specialRequests' => [],
                'language' => 'en_SG',
                'stops' => [
                    [
                        'coordinates' => [
                            'lat' => '1.3140113',
                            'lng' => '103.8807331'
                        ],
                        'address' => 'Lorong 23 Geylang, Singapore Badminton Hall, Singapore'
                    ],
                    [
                        'coordinates' => [
                            'lat' => '1.2966147',
                            'lng' => '103.8485095'
                        ],
                        'address' => 'Stamford Road, National Museum of Singapore, Singapore'
                    ]
                ]
            ]
        ];

        $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
        $rawSignature = "{$time}\n{$method}\n{$path}\n\n{$jsonBody}";
        $signature = hash_hmac("sha256", $rawSignature, $secret);
        $token = $key . ':' . $time . ':' . $signature;

        $startTime = microtime(true);

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'hmac ' . $token,
                'Accept' => 'application/json',
                'Market' => $region
            ])->timeout(10)->post($baseURL . $path, $body);

            $httpCode = $response->status();
            $responseData = $response->body();
        } catch (\Exception $e) {
            Log::error('Lalamove API request failed', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'message' => 'An error occurred while processing the request',
                'error' => $e->getMessage()
            ], 500);
        }

        $elapsedTime = floor((microtime(true) - $startTime) * 1000);

        return response()->json([
            'elapsed_time_ms' => $elapsedTime,
            'authorization' => 'hmac ' . $token,
            'status_code' => $httpCode,
            'response_data' => $responseData
        ]);
    }


    public function getQuotationXXX(Request $request)
    {
        $key = env('LALAMOVE_API_KEY');
        $secret = env('LALAMOVE_API_SECRET');
        $baseURL = env('LALAMOVE_BASE_URL');
        $region = env('LALAMOVE_REGION');
        $method = 'POST';
        $path = '/v3/quotations';
        $time = time() * 1000;

        $body = [
            'data' => [
                'serviceType' => 'MOTORCYCLE',
                'specialRequests' => [],
                'language' => 'en_SG',
                'stops' => [
                    [
                        'coordinates' => [
                            'lat' => '1.3140113',
                            'lng' => '103.8807331'
                        ],
                        'address' => 'Lorong 23 Geylang, Singapore Badminton Hall, Singapore'
                    ],
                    [
                        'coordinates' => [
                            'lat' => '1.2966147',
                            'lng' => '103.8485095'
                        ],
                        'address' => 'Stamford Road, National Museum of Singapore, Singapore'
                    ]
                ]
            ]
        ];

        $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
        $rawSignature = "{$time}\r\n{$method}\r\n{$path}\r\n\r\n{$jsonBody}";
        $signature = hash_hmac("sha256", $rawSignature, $secret);
        $token = $key . ':' . $time . ':' . strtolower($signature);

        Log::debug('Raw Signature String: ' . $rawSignature);
        Log::debug('Computed HMAC Signature: ' . $signature);

        $startTime = microtime(true);

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'hmac ' . $token,
                'Accept' => 'application/json',
                'Market' => $region
            ])->timeout(10)->post($baseURL . $path, $body);

            $httpCode = $response->status();
            $responseData = $response->body();
        } catch (\Exception $e) {
            Log::error('Lalamove API request failed', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'message' => 'An error occurred while processing the request',
                'error' => $e->getMessage()
            ], 500);
        }

        $elapsedTime = floor((microtime(true) - $startTime) * 1000);

        return response()->json([
            'elapsed_time_ms' => $elapsedTime,
            'authorization' => 'hmac ' . $token,
            'status_code' => $httpCode,
            'response_data' => $responseData
        ]);
    }


    // lalamove

    public function getQuotation()
    {
        $headers = [
            'Content-Type' => 'application/json',
            // 'Authorization' => 'hmac pk_test_42cf4ba3598ec5495ff811902d4e992f:1716949866799:4ea668fc32d58b7d4ea9b4df9425274f801d880329b8553bae9f6e751b976851',
            // pk_test_42cf4ba3598ec5495ff811902d4e992f:1716950580018:1af268c175a0f682e3544e9739e1036ca682da4207fafd29840721739a796c74',
            // 'Authorization' => 'hmac pk_test_42cf4ba3598ec5495ff811902d4e992f:1716950580018:1af268c175a0f682e3544e9739e1036ca682da4207fafd29840721739a796c74',
            'Market' => 'HK',
        ];

        $body = [
            "data" => [
                "serviceType" => "MOTORCYCLE",
                "language" => "en_HK",
                "stops" => [
                    [
                        "coordinates" => [
                            "lat" => "22.33547351186244",
                            "lng" => "114.17615807116502",
                        ],
                        "address" => "Innocentre, 72 Tat Chee Ave, Kowloon Tong",
                    ],
                    [
                        "coordinates" => [
                            "lat" => "22.284801519832378",
                            "lng" => "114.19267803352939",
                            // 22.284801519832378, 114.19267803352939
                        ],
                        "address" => "16 Tsing Fung St, Causeway Bay, Hong Kong",
                    ],
                ],
                "isRouteOptimized" => false,
                "item" => [
                    "quantity" => "12",
                    "weight" => "LESS_THAN_3_KG",
                    "categories" => [
                        "FOOD_DELIVERY",
                        "OFFICE_ITEM",
                    ],
                    "handlingInstructions" => [
                        "KEEP_UPRIGHT",
                    ],
                ],
            ],
        ];

        $response = Http::withHeaders($headers)->post('https://rest.sandbox.lalamove.com/v3/quotations', $body);

        return response()->json($response->json());
    }

    // lalamove

    
}
