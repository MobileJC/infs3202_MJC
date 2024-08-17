<?php
namespace App\Controllers;
use App\Models\User_Profile_model;

class User_Profile extends BaseController

{
    private $displayUserProfile;

    public function __construct()
    {
        $session = session();
        $sessionUsername = $session->get('username');        
        $userProfileModel = new User_Profile_model();
        $this->displayUserProfile['data'] = $userProfileModel->getProfileAttr($sessionUsername);

    }

    public function index()
    {
        $data0['error']='';
        $session = session();
        $sessionUsername = $session->get('username');
        echo view('template/header');
        if (isset($this->displayUserProfile['data'])) {
            echo view('user_profile_error', $data0);
            echo view("user_profile", $this->displayUserProfile);
        } else {
            echo 'You are not supposed to be here. You have not logged in.';
        }
        echo view('template/footer');
    }

    public function update_user()
    {
        $data1['error']='<div class=\"alert alert-success\" role=\"alert\">Profile updated.</div>';
        $data2['error']='<div class=\"alert alert-danger\"Your new password is less than 4 characters.</div>';
        $data3['error']='<div class=\"alert alert-danger\"Your old password is incorrect.</div>';
        $session = session();
        $userProfileModel = new User_Profile_model();
        $sessionUsername = $session->get('username');
        $rules = [
            'newPassword'  => 'required|min_length[4]',
        ];
        $oldPassword = $this->request->getPost('oldPassword');
        $passwordInDB = $userProfileModel->getExistingPW($sessionUsername);
        $newPassword = $this->request->getPost('newPassword');
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $email = $this->request->getPost('email');

        if (password_verify($oldPassword, $passwordInDBpassword_verify)) {
            if ($this->validate($rules)) {
                $updateUser = $userProfileModel->updateUser($sessionUsername, $hashedPassword, $email);
                $this->displayUserProfile['data'] = $userProfileModel->getProfileAttr($sessionUsername);
                echo view('template/header');
                echo view('user_profile_error', $data1);
                echo "Profile updated.";
                echo view("user_profile", $this->displayUserProfile);
                echo view('template/footer');
            } else {
                echo view('template/header');
                echo view('user_profile_error', $data2);
                echo "Your new password is less than 4 characters.";
                echo view("user_profile", $this->displayUserProfile);
                echo view('template/footer');
            }
        } else {
            echo view('template/header');
            echo view('user_profile_error', $data3);
            echo "Your old password is incorrect.";
            echo view("user_profile", $this->displayUserProfile);
            echo view('template/footer');
        }
    }
}