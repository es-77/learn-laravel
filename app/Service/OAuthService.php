<?php

// app/Services/OAuthService.php

namespace App\Service;

use GuzzleHttp\Client;

class OAuthService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function authenticate($authUrl, $clientId, $redirectUri, $scope, $state)
    {
        // Redirect user to authorization URL
        return redirect()->away($authUrl . '?' . http_build_query([
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'scope' => $scope,
            'state' => $state,
            'response_type' => 'code',
        ]));
    }

    public function getAccessToken($accessTokenUrl, $clientId, $clientSecret, $code, $redirectUri)
    {
        $response = $this->client->post($accessTokenUrl, [
            'form_params' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'code' => $code,
                'redirect_uri' => $redirectUri,
                'grant_type' => 'authorization_code',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}


// namespace App\Service;

// use GuzzleHttp\Client;
// use Illuminate\Support\Facades\Http;

// class OAuthService
// {
//     protected $client;

//     public function __construct()
//     {
//         $this->client = new Client();
//     }

//     public function authenticate($authUrl, $accessTokenUrl, $clientId, $clientSecret, $scope, $state, $callbackUrl)
//     {
//         // Redirect user to authorization URL
//         return redirect()->away($authUrl . '?' . http_build_query([
//             'client_id' => $clientId,
//             'redirect_uri' => $callbackUrl,
//             'scope' => $scope,
//             'state' => $state,
//             'response_type' => 'code',
//         ]));
//     }

//     public function getAccessToken($accessTokenUrl, $clientId, $clientSecret, $code, $redirectUri)
//     {
//         $response = $this->client->post($accessTokenUrl, [
//             'form_params' => [
//                 'client_id' => $clientId,
//                 'client_secret' => $clientSecret,
//                 'code' => $code,
//                 'redirect_uri' => $redirectUri,
//                 'grant_type' => 'authorization_code',
//             ],
//         ]);
//         Http::post('https://webhook.site/61d00f8a-86c1-4faa-9eb5-3b2570b91d34', [
//             'key' => 'value', // Add any data you want to send in the request body
//         ]);

//         return json_decode($response->getBody(), true);
//     }

//     // Implement methods for token refresh, token storage, etc.
// }