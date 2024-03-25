<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>auth login form</title>
</head>

<body>
    <div class="container mt-5">
        <form class="row g-3" method="POST" action="{{ route('auth-login-form-submit') }}">
            @csrf
            <div class="col-md-6">
                <label for="grant_type" class="form-label">Grant type</label>
                <select id="grant_type" name="grant_type" class="form-select">
                    <option>Choose...</option>
                    <option selected value="authorization_code">Authorization Code</option>
                    <option value="Authorization Code (With PKCE)">Authorization Code (With PKCE)</option>
                    <option value="Implicit">Implicit</option>
                    <option value="Password Credentials">Password Credentials</option>
                    <option value="Client Credentials">Client Credentials</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="callback_url" class="form-label">Callback URL</label>
                <input type="text" name="callback_url" class="form-control" id="callback_url">
            </div>
            <div class="col-md-6">
                <label for="auth_url" class="form-label">Auth URL</label>
                <input type="text" name="auth_url" class="form-control" id="auth_url"
                    value="https://accounts.google.com/o/oauth2/auth">
            </div>
            <div class="col-md-6">
                <label for="access_token_url" class="form-label">Access Token URL</label>
                <input type="text" name="access_token_url" class="form-control" id="access_token_url"
                    value="https://accounts.google.com/o/oauth2/token">
            </div>
            <div class="col-md-6">
                <label for="client_id" class="form-label">Client ID</label>
                <input type="text" name="client_id" class="form-control" id="client_id"
                    value="99636022384-27j1aqkcc46ca7p9e90sn54j2d31cvh0.apps.googleusercontent.com">
            </div>
            <div class="col-md-6">
                <label for="client_secret" class="form-label">Client Secret</label>
                <input type="text" name="client_secret" class="form-control" id="client_secret"
                    value="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">
            </div>
            <div class="col-md-6">
                <label for="scope" class="form-label">Scope</label>
                <input type="text" name="scope" class="form-control" id="scope"
                    value="https://www.googleapis.com/auth/drive.metadata.readonly">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Get New Access Token</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>

{{-- 
    
    
    POST https://accounts.google.com/o/oauth2/token
200
539 ms
Network
addresses: {…}
tls: {…}
Request Headers
Content-Type: application/x-www-form-urlencoded
Authorization: Basic NDE3Mzg3NTI5NDMwLW9jcDlyZWdtOWZiYnNtN3RzbGpudHI5bjRsNXRpNGxmLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tOkdPQ1NQWC0wVW1sVWEzYkV4SHV6U0Vua3FVcDU0S0FKZ1pw
User-Agent: PostmanRuntime/7.36.3
Accept: */*
Cache-Control: no-cache
Postman-Token: 50106f08-699e-4568-b42f-38b51b011186
Host: accounts.google.com
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 168
Request Body
grant_type: "authorization_code"
code: "4/0AeaYSHBDMq6GSLbaXscMDk7eF0yPfiFzRzeqK1XtjlZFjdHD5AUnk5L4-IAKB8La0c2W8g"
redirect_uri: "https://oauth.pstmn.io/v1/callback"
Response Headers
Expires: Mon, 01 Jan 1990 00:00:00 GMT
Date: Sat, 23 Mar 2024 12:48:46 GMT
Cache-Control: no-cache, no-store, max-age=0, must-revalidate
Pragma: no-cache
Content-Type: application/json; charset=utf-8
Vary: Origin
Vary: X-Origin
Vary: Referer
Content-Encoding: gzip
Server: scaffolding on HTTPServer2
X-XSS-Protection: 0
X-Frame-Options: SAMEORIGIN
X-Content-Type-Options: nosniff
Alt-Svc: h3=":443"; ma=2592000,h3-29=":443"; ma=2592000
Transfer-Encoding: chunked
Response Body
{
  "access_token": "ya29.a0Ad52N38if2DFMvD0L8Xy1638vwv1iAuApVI1kTRSm0qqj4oahdrgUreYoe4AzMdnV-mnattovNgGU48zo2H0zZjuibgAqLwU3TM8XxBY4zNf73Uhs9W4X0vvllQ6VWc7Tal2u6JW1-08ifMhlhHSGW3LkhwoyDT_7ycaCgYKAR0SARISFQHGX2MiN7u7GbFWy7Slrj19W9KVmg0170",
  "expires_in": 3594,
  "scope": "https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/gmail.labels https://www.googleapis.com/auth/gmail.addons.current.message.metadata https://www.googleapis.com/auth/gmail.readonly openid",
  "token_type": "Bearer",
  "id_token": "eyJhbGciOiJSUzI1NiIsImtpZCI6ImFkZjVlNzEwZWRmZWJlY2JlZmE5YTYxNDk1NjU0ZDAzYzBiOGVkZjgiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiNDE3Mzg3NTI5NDMwLW9jcDlyZWdtOWZiYnNtN3RzbGpudHI5bjRsNXRpNGxmLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiYXVkIjoiNDE3Mzg3NTI5NDMwLW9jcDlyZWdtOWZiYnNtN3RzbGpudHI5bjRsNXRpNGxmLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTEzNjcwMzIxNjE5OTkzODY1MDIxIiwiZW1haWwiOiJlbW1hbnVlbHNhbGVlbTA5ODc2NUBnbWFpbC5jb20iLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXRfaGFzaCI6InNOcW9kT2VKa2JScVZfbm5iVFcwaFEiLCJpYXQiOjE3MTExOTgxMjYsImV4cCI6MTcxMTIwMTcyNn0.bFqgKqe6ILkLrDbPjxyvbChz4aR_5fiN-rArrG6cbooAX3DY17AC50_KgHQSQppFdtHVVyI7KKJU3FVHQPkUd5EhA7py1UpHbb1oxY6RcukdunKnZnQxKCowJa66bKXNftV8QGmTNONEQOueebPdGyiJ52lp6g_qTTtMn5Pvmu1mxRx3Ou1aXC6-7qOzvzL4QG5AVIn8M1YN6VdgzfGVakCL55oEagRA_oAENai_Z83AowtUQaeDQhayo9YD2XMItYffBcMxFUfoGxGnJBlKIdq0ZdjqwtNkQrSSlEGH11cQHNrrYfzCcvhMqxEA9ZId6ZIvQgpzSSIeuETZYrdPbg"
}
    
    
    --}}
