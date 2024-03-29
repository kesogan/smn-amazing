<?php

namespace App\Utilities\Paypal;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment which has access
     * credentials context. This can be used invoke PayPal API's provided the
     * credentials have the access to do so.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Setting up and Returns PayPal SDK environment with PayPal Access credentials.
     * For demo purpose, we are using SandboxEnvironment. In production this will be
     * LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = getenv("CLIENT_ID") ?: "AZKSrRYxNIVGmQYv0teiXVVTjmYcLLSyXATGsBOK8Mn8Wwzq4cyBqgITTQzdOPLYlZv9QW8pCpPCWTBN";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EEkUoOTcWbdd5gKOhLjHR3lK7yxaAlf2AwqLCDkrdszGV2MrikxDRlzSixngAMZiq109UgWpnNrkAUXz";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}
