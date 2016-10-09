<?php

include_once( 'src/Authenticator.php' );

$authorizeUrl = 'https://ssl.reddit.com/api/v1/authorize';
$accessTokenUrl = 'https://ssl.reddit.com/api/v1/access_token';
$clientId = '';
$clientSecret = '';
$userAgent = 'RedditApiClient/0.1 by YourUserName';

$redirectUrl =  "YourRedirectURL";

$auth = new Authenticator( $authorizeUrl, $accessTokenUrl, $clientId, $clientSecret, $userAgent, $redirectUrl );
$auth->authenticate();