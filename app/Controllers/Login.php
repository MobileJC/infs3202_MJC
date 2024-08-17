<?php

namespace App\Controllers;
use App\Models\User_model;

class Login extends BaseController
{
    public function index()
    {
        $data['error'] = "";
        if (session()->get('username')) {
            echo view('template/header');
            echo view("forum_main");
            echo view('template/footer');
        } else {
            // Check if the "user" cookie exists and pre-fill the username field
            $cookie_name = 'user';
            if(isset($_COOKIE[$cookie_name])){
                $data['username'] = $_COOKIE[$cookie_name];
            } else {
                $data['username'] = '';
            }
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
        }
    }

    public function check_login()
    {
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $check = false;
        $model = new User_model();
        $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptchaData = [
            'secret'    => '',
            'response'  => $recaptchaResponse,
            'remoteip'  => $this->request->getIPAddress(),
        ];
        $recaptchaOptions = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($recaptchaData),
            ],
        ];
        $recaptchaContext = stream_context_create($recaptchaOptions);
        $recaptchaResult = file_get_contents($recaptchaUrl, false, $recaptchaContext);
        $recaptchaJson = json_decode($recaptchaResult);

        if (!$recaptchaJson->success) {
            # reCAPTCHA validation failed
            $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Please verify that you are not a robot. </div> ";
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
            return;
        }

        $user = $model->login($username);
//        echo "<pre>";
//        print_r($user);
//        echo "</pre>";

        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set('username', $username);
            $session->set('password', $password);
            $this->remember_me($username);
            return redirect()->to(base_url('forum_main'));
        } else {
            $data['username'] = $username;
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
        }
    }

    public function remember_me($username)
    {
        $rememberMeChecked = $this->request->getPost('remember_me');
        $cookie_name = 'user';
        $cookie_value = $username;
        # Set cookie for 6 hours if remember me is set
        if(isset($rememberMeChecked))
        {
            setcookie($cookie_name, $cookie_value, time()+3600*6,"/");
        }
        else{
            setcookie($cookie_name, $cookie_value, time()-3600,"/");
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('username');
        $session->remove('password');
        return redirect()->to(base_url('login'));
    }
}