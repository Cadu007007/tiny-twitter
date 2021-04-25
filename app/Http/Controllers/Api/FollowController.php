<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FollowService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FollowController extends Controller
{

    protected $followService;

    /**
     * follow service constructor.
     *
     * @param \App\Services\FollowService  $followService
     */
    public function __construct(FollowService $followService)
    {
        $this->followService = $followService;

    }
    /**
     * follow or unfollow user
     *
     * @param Request
     *
     * @return Json Response
     *
     * @author Amr Degheidy
     *
     **/
    public function followChange(Request $request): JsonResponse
    {
        return response()->json($this->followService->followToggle($request->id));
    }
}
