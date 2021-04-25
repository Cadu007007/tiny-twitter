<?php

namespace App\Repositories;

use App\Models\Tweet;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class UserRepository
{

    /**
     * @param $data
     *
     *
     * @return \App\Models\User
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * make report for users
     *
     * @param null
     *
     * @return \Barryvdh\DomPDF\Facade;
     *
     * @author Amr Degheidy
     *
     **/
    public function makeReport()
    {
        $users = $this->getUsersWithTweetCounts();
        $tweetAvg = Tweet::count() / $users->count();
        $pdf = PDF::loadView('report', ['users' => $users, 'tweetAvg' => $tweetAvg]);
        return $pdf;
    }

    /**
     * get all users with tweets count for each user
     *
     * @param null
     *
     * @return App\Models\User
     *
     * @author Amr Degheidy
     *
     **/
    private function getUsersWithTweetCounts()
    {
        return User::all()->each(function ($user) {
            $user->tweet_count = $user->tweets()->count();
        });
    }

}
