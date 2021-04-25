<?php

namespace App\Services;

use App\Http\Resources\TweetResource;
use App\Repositories\TweetRepository;

class TweetService
{

    const TWEET_POSTED = 'Your Tweet Posted Successfully';
    protected $tweetRepository;

    /**
     * tweet repository constructor
     *
     * @param App\Repository\TweetRepository
     *
     *
     **/
    public function __construct(TweetRepository $tweetRepository)
    {
        $this->tweetRepository = $tweetRepository;
    }

    /**
     *
     *
     * @param data
     *
     * @return array
     *
     *
     **/
    public function create(array $data): array
    {
        $this->tweetRepository->create($data);

        return ['success' => true, 'message' => self::TWEET_POSTED, 'data' => TweetResource::collection(auth()->user()->tweets)];
    }
}
