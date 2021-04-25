<?php

namespace App\Services;

use App\Models\Follow;
use App\Repositories\FollowRepository;

class FollowService
{

    const FOLLOW_RESPONSE = 'Follow Success';
    const UNFOLLOW_RESPONSE = 'Un Follow Success';

    protected $followRepository;

    /**
     * tweet repository constructor
     *
     * @param App\Repository\FollowRepository
     *
     *
     **/
    public function __construct(FollowRepository $followRepository)
    {
        $this->followRepository = $followRepository;
    }
    /**
     * change follow status
     *
     * @param $id
     *
     * @return array
     *
     * @author Amr Degheidy
     *
     **/
    public function followToggle($id)
    {

        if (auth()->guard('api')->user()->follows()->where('following_id', $id)->exists()) {
            $this->followRepository->unFollow($id);

            $response = ['success' => true, 'message' => self::UNFOLLOW_RESPONSE];
        } else {
            $this->followRepository->follow($id);

            $response = ['success' => true, 'message' => self::FOLLOW_RESPONSE];
        }

        return $response;

    }
}
