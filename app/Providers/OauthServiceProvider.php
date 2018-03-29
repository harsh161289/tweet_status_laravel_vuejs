<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Services\TwitterService;

/*
 * oAuth Service provider
 * author Harsh
 */
class OauthServiceProvider extends ServiceProvider {

    public function register() {
        //echo "coming in OauthServiceProvider";

        $this->app->singleton(TwitterService::class, function($app) {
            $config = config('ttwitter');

            return new TwitterService($config['TWITTER_CONSUMER_KEY'],
                $config['TWITTER_CONSUMER_SECRETKEY'],$config['TWITTER_ACCESS_TOKEN'], $config['TWITTER_ACCESS_TOKEN_SECRETKEY'], $config['TWITTER_CALLBACK_URL']);
        });
    }

}

?>