<?php

namespace App\Services;

use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Twitter Service to interact with Abraham\TwitterOAuth\TwitterOAuth
 * Class TwitterService
 * @package App\Services
 */
class TwitterService
{

    const ACCESS_TOKEN = "ACCESS_TOKEN";
    const ACCESS_TOKEN_SECRET = "ACCESS_TOKEN_SECRET";
    const SHOW_STATUSES = "statuses/show";
    const OAUTH_TOKEN = "oauth/request_token";

    private $twitterOAuth;

    private $oath_callback;

    private $access_token_object;


    function __construct($_consumerKey, $_consumerSecretKey, $_access_token, $_access_token_secret, $_oath_callback)
    {
        $this->oath_callback = $_oath_callback;
        $this->access_token_object[self::ACCESS_TOKEN] = $_access_token;
        $this->access_token_object[self::ACCESS_TOKEN_SECRET] = $_access_token_secret;

        $this->twitterOAuth = new TwitterOAuth($_consumerKey, $_consumerSecretKey, $_access_token, $_access_token_secret);
    }

    /**
     * @return bool
     * @throws \Abraham\TwitterOAuth\TwitterOAuthException
     */
    function getConnection()
    {
        $response = $this->twitterOAuth->get("account/verify_credentials");
        print_r($response);
        if (!empty($response->errors)) {
            // DebugBar::info("Twitter connection failed with code: ".$error->code." , message: ".$error->message);

            $this->initializeNewToken();
            $this->twitterOAuth->setOauthToken($this->access_token_object[self::ACCESS_TOKEN], $this->access_token_object[self::ACCESS_TOKEN_SECRET]);
            $this->getConnection();

        } elseif (!empty($response->id)) {
            session(self::ACCESS_TOKEN, $this->access_token_object[self::ACCESS_TOKEN]);
            session(self::ACCESS_TOKEN_SECRET, $this->access_token_object[self::ACCESS_TOKEN_SECRET]);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @throws \Abraham\TwitterOAuth\TwitterOAuthException
     */
    function initializeNewToken()
    {
        $response = $this->twitterOAuth->oauth(self::ACCESS_TOKEN, array('oauth_callback' => $this->oath_callback));

        if ($response["oauth_callback_confirmed"] == true || $response["oauth_callback_confirmed"] == "true") {
            $this->access_token_object[self::ACCESS_TOKEN] = $response['oauth_token'];
            $this->access_token_object[self::ACCESS_TOKEN_SECRET] = $response['oauth_token_secret'];
        }
    }

    /**
     * @param $tweet_id
     * @return array|object
     */
    function getTweetData($tweet_id)
    {
        if (empty($tweet_id)) {
            throw new InvalidArgumentException("Tweet id should cannot be an empty");
        }
        return $this->twitterOAuth->get(self:: SHOW_STATUSES, ["id" => $tweet_id]);
    }
}

?>