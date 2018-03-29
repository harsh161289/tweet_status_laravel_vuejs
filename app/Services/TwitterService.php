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

    function __construct($_consumerKey, $_consumerSecretKey, $_access_token, $_access_token_secret, $_oath_callback)
    {
        $this->oath_callback = $_oath_callback;

        $this->twitterOAuth = new TwitterOAuth($_consumerKey, $_consumerSecretKey, $_access_token, $_access_token_secret);
    }

    /**
     * Search tweet status based on id
     *
     * @param $tweet_id
     * @return array|object
     */
    public function findById($tweet_id)
    {
        if (empty($tweet_id)) {
            throw new InvalidArgumentException("Tweet id should cannot be an empty");
        }
        return $this->twitterOAuth->get(self:: SHOW_STATUSES, ["id" => $tweet_id]);
    }
}

?>