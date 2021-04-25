<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;

class ReportController extends Controller
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
     * download users repository
     *
     * @param null
     *
     * @return \Barryvdh\DomPDF\Facade;
     *
     * @author Amr Degheidy
     *
     **/
    public function download()
    {

        $pdf = $this->userService->downloadReport();
        return $pdf->download('report.pdf');
    }
}
