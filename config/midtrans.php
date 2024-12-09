<?php

return
[
    'serveyKey' => env('MIDTRANS_SERVEY_KEY', ''),
    'client_key' => env('MIDTRANS_CLIENT_KEY', ''),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED'),
    'is3ds' => env('MIDTRANS_IS_3DS'),
];
