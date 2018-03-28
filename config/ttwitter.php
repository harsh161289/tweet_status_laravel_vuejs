<?php

// You can find the keys here : https://apps.twitter.com/

return [
	'debug'               => function_exists('env') ? env('APP_DEBUG', false) : false,

	'API_URL'             => 'api.twitter.com',
	'UPLOAD_URL'          => 'upload.twitter.com',
	'API_VERSION'         => '1.1',
	'AUTHENTICATE_URL'    => 'https://api.twitter.com/oauth/authenticate',
	'AUTHORIZE_URL'       => 'https://api.twitter.com/oauth/authorize',
	'ACCESS_TOKEN_URL'    => 'https://api.twitter.com/oauth/access_token',
	'REQUEST_TOKEN_URL'   => 'https://api.twitter.com/oauth/request_token',
	'USE_SSL'             => true,

	'TWITTER_CONSUMER_KEY'        => function_exists('env') ? env('TWITTER_CONSUMER_KEY', '') : '',
	'TWITTER_CONSUMER_SECRETKEY'     => function_exists('env') ? env('TWITTER_CONSUMER_SECRETKEY', '') : '',
	'TWITTER_ACCESS_TOKEN'        => function_exists('env') ? env('TWITTER_ACCESS_TOKEN', '') : '',
	'TWITTER_ACCESS_TOKEN_SECRETKEY' => function_exists('env') ? env('TWITTER_ACCESS_TOKEN_SECRETKEY', '') : '',
	'TWITTER_CALLBACK_URL' => function_exists('env') ? env('TWITTER_CALLBACK_URL', '') : '',
];
