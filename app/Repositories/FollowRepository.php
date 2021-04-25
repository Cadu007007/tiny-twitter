<?php

namespace App\Repositories;

use App\Models\Follow;

class FollowRepository
{

    /**
     * follow user with that id
     *
     * @param $id
     *
     * @return bool
     *
     * @author Amr Degheidy
     *
     **/
    public function follow($id)
    {
        Follow::create([
            'user_id' => auth()->guard('api')->id(),
            'following_id' => $id,
        ]);
        return false;

    }

    /**
     * unfollow user with that id
     *
     * @param $id
     *
     * @return bool
     *
     * @author Amr Degheidy
     *
     **/
    public function unFollow($id)
    {
        $user = auth()->guard('api')->user();
        $user->follows()->where('id', $id)->delete();
        return true;
    }
}
