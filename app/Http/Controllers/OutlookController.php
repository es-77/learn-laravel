<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;

class OutlookController extends Controller
{
    public function redirectToMicrosoftLogin($userID = 1)
    {

        // Initialize the OAuth client
        $oauthClient = new GenericProvider([
            'clientId' => env('OAUTH_APP_ID'),
            'clientSecret' => env('OAUTH_APP_PASSWORD'),
            'redirectUri' => env('OAUTH_REDIRECT_URI'),
            'urlAuthorize' => env('OAUTH_AUTHORITY') . env('OAUTH_AUTHORIZE_ENDPOINT'),
            'urlAccessToken' => env('OAUTH_AUTHORITY') . env('OAUTH_TOKEN_ENDPOINT'),
            'urlResourceOwnerDetails' => '',
            'scopes' => env('OAUTH_SCOPES')
        ]);
        Session::put('o365user_id', $userID);
        $authUrl = $oauthClient->getAuthorizationUrl();
        // dd($authUrl);

        // Save client state so we can validate in callback
        session(['oauthState' => $oauthClient->getState()]);

        // Redirect to the signin page
        return redirect()->away($authUrl);
    }
    public function handleMicrosoftLoginCallback(Request $request)
    {
        // Validate state
        $expectedState = session('oauthState');
        $request->session()->forget('oauthState');
        $providedState = $request->query('state');
        if (!isset($expectedState)) {
            // If there is no expected state in the session,
            // do nothing and redirect to the home page.
            return redirect('/admin')->with('error', 'SMTP not configured, Try again');
        }

        // Authorization code should be in the "code" query param
        $authCode = $request->query('code');
        if (isset($authCode)) {
            // Initialize the OAuth client
            $oauthClient = new GenericProvider([
                'clientId' => env('OAUTH_APP_ID'),
                'clientSecret' => env('OAUTH_APP_PASSWORD'),
                'redirectUri' => env('OAUTH_REDIRECT_URI'),
                'urlAuthorize' => env('OAUTH_AUTHORITY') . env('OAUTH_AUTHORIZE_ENDPOINT'),
                'urlAccessToken' => env('OAUTH_AUTHORITY') . env('OAUTH_TOKEN_ENDPOINT'),
                'urlResourceOwnerDetails' => '',
                'scopes' => env('OAUTH_SCOPES')
            ]);

            // StoreTokensSnippet
            try {
                // Make the token request
                $accessToken = $oauthClient->getAccessToken('authorization_code', [
                    'code' => $authCode
                ]);
                $user = User::find(Session::get('o365user_id'));
                $user->secret_key = encrypt($accessToken);
                $user->save();
                return redirect('/admin')->with('success', 'Microsoft Office 365 connected successfully');
            } catch (IdentityProviderException $e) {
                return redirect('/admin')
                    ->with('error', 'Something goes wrong. Please try again.')
                    ->with('errorDetail', $e->getMessage());
            } catch (\Throwable $e) {
                return redirect()->back()->with('error', "Unexcepted Error Occured. Contact Support - " . $e->getMessage());
            }
        }
        return redirect('/smtp')
            ->with('error', $request->query('error'))
            ->with('errorDetail', $request->query('error_description'));
    }
    public function fetchReceipts()
    {

        try {
            $redirectToProfile = false;
            $newReceiptCount = 0;
            $ExistingToken = decrypt(Auth::user()->secret_key);
            dd(123);
            $accessToken = $this->refreshToken($ExistingToken, Auth::user()->id);
            $graph = new Graph();
            $graph->setAccessToken($accessToken);

            $user = $graph->createRequest('GET', '/me')
                ->setReturnType(\Microsoft\Graph\Model\User::class)
                ->execute();

            if (!$user) {
                dd('2. SMTP not configured, Try again');
                return redirect('/dashboard')->with('error', 'SMTP not configured, Try again');
            }
            dd(1);
            $user = json_decode(json_encode($user));
            $folderpath = public_path('storage') . '/' . Auth::user()->id . '/new';

            if (!file_exists($folderpath) && !is_dir($folderpath)) {
                File::makeDirectory($folderpath, $mode = 0777, true, true);
            }

            $files = array();
            $graph->setAccessToken($accessToken);
            $url = "/me/messages?orderby=InferenceClassification, ReceivedDateTime DESC&filter=InferenceClassification eq 'focused'&top=15";

            $response = $graph->createRequest('GET', $url)
                ->setReturnType(\Microsoft\Graph\Model\Event::class)
                ->execute();

            $response = json_decode(json_encode($response));

            if (!empty($response)) {

                $newCategory = Category::where(['user_id' => Auth::user()->id, 'name' => 'New'])->first();
                if (!$newCategory) {
                    $newCategory = Category::create(['name' => 'New', 'user_id' => Auth::user()->id]);
                }

                $newFolder = Folder::where(['user_id' => Auth::user()->id, 'name' => 'New'])->first();
                if (!$newFolder) {
                    $newFolder = Folder::create(['name' => 'New', 'user_id' => Auth::user()->id, 'parent_id' => $newCategory->id]);
                }

                foreach ($response as $key => $email) {
                    if (
                        !empty($email->bodyPreview) &&
                        (Str::contains(Str::lower($email->subject), ['receipt']))
                    ) {

                        $fetchedEmailData = [];
                        $fetchedEmailData = ['user_id' => Auth::user()->id, 'recived_from' => $email->sender->emailAddress->address, 'subject' => Str::lower($email->subject), 'received_date' => $email->receivedDateTime];

                        $checkEmailFetched = FetchedEmailData::where($fetchedEmailData)->first();

                        if (!$checkEmailFetched) {
                            $redirectToProfile = true;
                            $now = time();

                            try {
                                Pdf::loadHTML($email->body->content)->save($folderpath . '/' . Carbon::parse($email->receivedDateTime)->format('d-F-Y-h-i-s') . '-' . $now . '.pdf');
                            } catch (Exception $e) {
                                $doc = new DOMDocument();
                                $doc->substituteEntities = false;
                                $content = mb_convert_encoding($email->body->content, 'html-entities', 'utf-8');
                                $doc->loadHTML($content);
                                $sValue = $doc->saveHTML();
                                Pdf::loadHTML(strip_tags($sValue))->save($folderpath . '/' . Carbon::parse($email->receivedDateTime)->format('d-F-Y-h-i-s') . '-' . $now . '.pdf');
                            }

                            \App\Models\File::Create(
                                [
                                    'id' => 1,
                                    'original_name' => Carbon::parse($email->receivedDateTime)->format('d-F-Y-h-i-s') . '-' . $now . '.pdf',
                                    'path' => 'New\\' . Carbon::parse($email->receivedDateTime)->format('d-F-Y-h-i-s') . '-' . $now . '.pdf',
                                    'user_id' => Auth::user()->id,
                                    'folder_id' => $newFolder->id,
                                    'category' => $newCategory->id,
                                    'created_at' => Carbon::now()->format('Y-m-d'),
                                ]
                            );

                            $fetchedEmailData['file_name'] = Carbon::parse($email->receivedDateTime)->format('d-F-Y-h-i-s') . '-' . $now . '.pdf';
                            FetchedEmailData::create($fetchedEmailData);
                            $newReceiptCount++;
                            array_push($files, 'storage/' . Auth::user()->id . '/new/' . Carbon::parse($email->receivedDateTime)->format('d-F-Y-h-i-s') . '-' . $now . '.pdf');
                        }
                    }
                }
            }

            if ($redirectToProfile) {
                return redirect('/dashboard/' . $newFolder->id)->with('success', $newReceiptCount . ' new receipts found.');
            } else {
                return redirect('/dashboard');
            }
        } catch (IdentityProviderException $e) {
            dd($e->getMessage());
            return redirect('/dashboard')
                ->with('error', 'Something goes wrong. Please try again.')
                ->with('errorDetail', $e->getMessage());
        } catch (\Throwable $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', "Unexcepted Error Occured. Contact Support - " . $e->getMessage());
        }
    }
}
