<?php

namespace App\Controllers;
use App\Models\Forgot_Password_model;

class Forgot_Password_Verify extends BaseController
{
    public function index() {
        $data0['error'] = "";
        echo view('template/header');
        echo view('forgot_password_verify', $data0);
        echo view('template/footer');
    }

    public function check_user_exist() {
        $username = $this->request->getPost('username');
        $usernameArray['usernameInPrvForm'] = $username;
        $sq1 = $this->request->getPost('sq1');
        $sq2 = $this->request->getPost('sq2');
        $sq3 = $this->request->getPost('sq3');
        $model = new Forgot_Password_model();
        $usernameInDB = $model->getUser($username);
        $sq1InDB = $model->getSQ1($username);
        $sq2InDB = $model->getSQ2($username);
        $sq3InDB = $model->getSQ3($username);

        
        $data1['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> No matching user. </div> "; 
        $data2['error'] = "<div class=\"alert alert-danger\" role=\"alert\">Wrong security answers. </div> ";

        if (isset($usernameInDB) && $username == $usernameInDB)
        {
            if ($sq1 == $sq1InDB && $sq2 == $sq2InDB && $sq3 == $sq3InDB) {
                echo view('template/header');
                echo view('forgot_password_reset', $usernameArray);
                echo view('template/footer');
            }
            else {
                echo view('template/header');                
                echo view('forgot_password_verify', $data2);
                echo view('template/footer');
            }
        } else {
            echo view('template/header');
            echo view('forgot_password_verify', $data1);
            echo view('template/footer');
        }
    }

}
