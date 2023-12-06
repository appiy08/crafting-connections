<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function logoutAuth()
    {
        $session = session();

        $session->destroy();
        return redirect()->to('/login');
    }
}
