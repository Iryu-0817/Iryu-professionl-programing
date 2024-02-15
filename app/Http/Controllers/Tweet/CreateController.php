<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $tweets = new Tweet;
        $tweets->user_id = $request->userId();
        $tweets->content = $request->tweet();
        $tweets->save();
        return redirect()->route('tweet.index');
    }
}
