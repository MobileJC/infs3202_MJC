<?php

namespace App\Controllers;

class Forum_Main extends BaseController {

    public function index() {
        $sessionUsername = session()->get('username');
        if (isset($sessionUsername)) {
            echo view("template/header");
            echo view("forum_main");
            echo view("template/footer");
        } else {
            return redirect()->to(base_url('login'));
        }
    }

}