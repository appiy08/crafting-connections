<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;


class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();
        echo "Hello : " . $session->get('name');
    }
}
