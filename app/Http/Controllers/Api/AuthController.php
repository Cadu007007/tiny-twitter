<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected $userService;

    /**
     * AuthController constructor.
     *
     * @param \App\Services\UserService  $userservice
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }

    /**
     *
     *
     * @param App\Http\Requests\UserRegisterRequest
     *
     * @return \Illuminate\Http\JsonResponse;

     *
     * @author Amr Degheidy
     *
     **/
    public function register(UserRegisterRequest $request): JsonResponse
    {
        return $this->userService->create($request->validated());
    }

    /**
     *
     *
     * @param App\Http\Requests\UserLoginRequest
     *
     * @return \Illuminate\Http\JsonResponse;
     *
     * @author Amr Degheidy
     *
     **/
    public function login(UserLoginRequest $request): JsonResponse
    {
        return response()->json($this->userService->login($request->validated()));

    }
}
