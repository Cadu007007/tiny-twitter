<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserService
{

    const SUCCESS_REGISTER = 'User Successfully Registered';
    const SUCCESS_LOGIN = 'You Are Logged In Successfully';
    const FAIL_LOGIN = 'Credentials Is Wrong Please Try Again.';

    protected $userRepository;

    /**
     * UserService constructor.
     *
     * @param \App\Repositories\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(array $data): JsonResponse
    {
        // passing validated data to user repository
        $this->userRepository->create($data);

        // authenticate the user after register
        $token = $this->authenticate($data[$this->username()], $data['password']);

        // return successful message with
        return response()->json(['success' => true, 'message' => self::SUCCESS_REGISTER, 'token' => $token]);
    }

    /**
     * login user service
     *
     * @param $data
     *
     * @return  array
     *
     * @author Amr Degheidy
     *
     **/
    public function login(array $data): array
    {

        // authenticate user and create token
        $token = $this->authenticate($data[$this->username()], $data['password']);
        $response = ['success' => true, 'message' => self::SUCCESS_LOGIN, 'token' => $token];
        if (!$token) {
            $response = ['success' => false, 'message' => self::FAIL_LOGIN, 'token' => $token];

        }
        //return response
        return $response;
    }

    /**
     * authenticate user to current guard
     *
     * @param $username
     *
     * @param $password
     *
     *
     * @author Amr Degheidy
     *
     **/
    private function authenticate($username, $password)
    {
        return Auth::guard('api')->attempt([$this->username() => $username, 'password' => $password]);
    }
    /**
     *get main credential to login
     *
     * @param null
     *
     * @return string
     *
     *
     **/
    private function username()
    {
        return 'email';
    }
}
