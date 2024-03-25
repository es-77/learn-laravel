<?php

use App\Http\Controllers\Auth2Controller;
use App\Service\OAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('auth-login', function () {
    dd('welcome');
});
Route::get('auth-login-form', [Auth2Controller::class, 'authLoginForm'])->name('auth-login-form');
Route::post('auth-login-form-submit', [Auth2Controller::class, 'authLoginFormSubmit'])->name('auth-login-form-submit');
Route::get('handle-call-back', [Auth2Controller::class, 'handleCallCack'])->name('handle-call-back');


// routes/web.php


Route::get('/oauth/authorize', function () {
    $oauthService = new OAuthService();

    // Replace these values with your actual OAuth provider details
    $authUrl = 'https://accounts.google.com/o/oauth2/auth';
    $clientId = '99636022384-27j1aqkcc46ca7p9e90sn54j2d31cvh0.apps.googleusercontent.com';
    $redirectUri = 'https://oauth.pstmn.io/v1/callback';
    $scope = 'https://www.googleapis.com/auth/drive.metadata.readonly'; // Adjust scope as needed
    $state = 'YOUR_STATE';

    return $oauthService->authenticate($authUrl, $clientId, $redirectUri, $scope, $state);
});

Route::get('/oauth/callback', function (\Illuminate\Http\Request $request) {
    $oauthService = new OAuthService();

    // Replace these values with your actual OAuth provider details
    $accessTokenUrl = 'https://accounts.google.com/o/oauth2/token';
    $clientId = '99636022384-27j1aqkcc46ca7p9e90sn54j2d31cvh0.apps.googleusercontent.com';
    $clientSecret = 'YOUR_CLIENT_SECRET';
    $redirectUri = 'https://oauth.pstmn.io/v1/callback';

    $code = $request->input('code');

    $response = $oauthService->getAccessToken($accessTokenUrl, $clientId, $clientSecret, $code, $redirectUri);

    // Store or handle the access token as needed
    dd($response); // Example: Output the response for testing

    // Redirect or respond based on your application logic
});