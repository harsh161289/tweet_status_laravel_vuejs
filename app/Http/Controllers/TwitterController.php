<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Services\TwitterService;

class TwitterController extends Controller
{
    private $twitterService;

    function __construct(TwitterService $service)
    {
        $this->twitterService = $service;
    }

   public function welcome() {
       return view('welcome');
   }

    /**
     * Landing page for Twitter Vue App
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        return view('vueApp');
    }

    /**
     * Find by Tweed id corresponding to: https://twitter.com/BMWMotorsport/status/{id}
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse Contains tweet status
     */
    public function getStatus(Request $request)
    {
        $input = $request->all();
        $response_object = $this->twitterService->getTweetData($input['id']);
        return response()->json([
            "tweet_id" => $response_object->id,
            "retweet_count" => $response_object->retweet_count,
            "favorite_count" => $response_object->favorite_count,
            "created_at" => $response_object->created_at,
            "user" => Array(
                "user_id" => $response_object->user->id,
                "user_screen_name" => $response_object->user->screen_name,
                "friends_count" => $response_object->user->friends_count,
                "followers_count" => $response_object->user->followers_count
            )
        ]);

    }
}

?>