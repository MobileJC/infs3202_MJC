<?php

namespace App\Controllers;

use App\Models\Create_Account_model;
use App\Models\Check_Database_Exists_model;
use Config\Services;
use Config\Database;
use CodeIgniter\Controller;

class Create_Account extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        helper('captcha');
    }

    public function index()
    {
        $data['error'] = "";
        echo view('template/header');
        echo view('create_account', $data);
        echo view('template/footer');
    }

    public function create_account()
    {
        $encrypter = \Config\Services::encrypter();
        $rules = [
            'username'  => 'required|min_length[8]',
            'password'  => 'required|min_length[4]',
            'passconf'  => 'required|matches[password]',
            'email'     => 'required|valid_email',
            'sq1'       => 'required',
            'sq2'       => 'required',
            'sq3'       => 'required',
        ];

        $data['error'] = "";
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $sq1 = $this->request->getPost('sq1');
        $sq2 = $this->request->getPost('sq2');
        $sq3 = $this->request->getPost('sq3');
        $session = session();

        $model = new Create_Account_model();
        $checkExistModel = new Check_Databse_Exists_model();

        $checkUserTableExist = $checkExistModel->checkAndCreateUsersTable();

        $check_exist = $model->check_account_exist($username);

        if ($check_exist || !$this->validate($rules)) {
            $session->destroy();
            $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Account exists or incorrect input. </div>";
            echo view('template/header');
            echo view('create_account', $data);
            echo view('template/footer');
            return;
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $model->create_account($username, $hashedPassword, $email, $sq1, $sq2, $sq3);
            $data['error'] = "<div class=\"alert alert-success\" role=\"alert\">Account created successfully.</div>";
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
            return;
        }
    }
}
