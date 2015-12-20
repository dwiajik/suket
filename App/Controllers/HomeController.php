<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $this->view('index.php');
    }

    public function dashboard()
    {
        $user = AuthController::auth();

        $this->view('dashboard/index.php', ['user' => $user]);
    }
}