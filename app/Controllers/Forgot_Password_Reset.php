<?php

namespace App\Controllers;
use App\Models\Forgot_Password_model;

class Forgot_Password_Reset extends BaseController {
    public function index() {
        echo view('template/header');
        echo view('forgot_password_reset');
        echo view('template/footer');
    }

    public function updatePassword() {
        $username = $this->request->getPost('username');
        $newPasswordReset = $this->request->getPost('newPasswordReset');
        $hashedNewPasswordReset = password_hash($newPasswordReset, PASSWORD_DEFAULT);
        $model = new Forgot_Password_model();
        $model->resetPassword($username, $hashedNewPasswordReset);
        return redirect()->to(base_url().'/login');
    }
}