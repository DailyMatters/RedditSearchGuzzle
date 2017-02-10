<?php

require_once './vendor/autoload.php';

use ApiReddit\Authenticator;

$authorizeUrl = 'https://ssl.reddit.com/api/v1/authorize';
$accessTokenUrl = 'https://ssl.reddit.com/api/v1/access_token';
$clientId = '...';
$clientSecret = '...';
$userAgent = '...';

$redirectUrl =  "...";

$auth = new Authenticator( $authorizeUrl, $accessTokenUrl, $clientId, $clientSecret, $userAgent, $redirectUrl );
$auth->authenticate();
