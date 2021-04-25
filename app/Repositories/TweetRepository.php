<?php

namespace App\Repositories;

use App\Models\Tweet;

class TweetRepository
{

    /**
     * @param $data
     *
     *
     * @return \App\Models\Tweet
     */
    public function create(array $data): Tweet
    {
        return auth()->user()->tweets()->create($data);
    }
}
