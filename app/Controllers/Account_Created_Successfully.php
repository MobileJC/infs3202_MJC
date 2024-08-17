<?php

namespace App\Controllers;

class Account_Created_Successfully extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('account_created_successfully');
        echo view('template/footer');
    }
}