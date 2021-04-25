<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTweetRequest;
use App\Services\TweetService;
use Illuminate\Http\JsonResponse;

class TweetController extends Controller
{

    protected $tweetService;

    /**
     * AuthController constructor.
     *
     * @param \App\Services\TweetService  $tweetService
     */
    public function __construct(TweetService $tweetService)
    {
        $this->tweetService = $tweetService;

    }

    /**
     * create tweet for authenticated user
     *
     * @param \App\Http\Requests\CreateTweetRequest;
     *
     * @return JsonResponse
     *
     *
     **/
    public function create(CreateTweetRequest $request): JsonResponse
    {
        return response()->json($this->tweetService->create($request->validated()));
    }
}
