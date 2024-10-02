<?php

namespace App\Controllers;
use App\Models\Create_Post_model;
use App\Models\Check_Database_Exists_model;

class Create_Post extends BaseController
{
    protected $helpers = ['form'];

    public function index() {
        $sessionUsername = session()->get('username');
        $data['errors']= "";
        if(isset($sessionUsername)) {
            echo view('template/header');
            echo view('create_post', $data);
            echo view('template/footer');
        } else {
            return redirect()->to(base_url('login'));
        }
        
    }

    public function insert_post() {

        $session = session();
        $postUsername = $session->get('username');
        $postTitle = $this->request->getPost('postTitle');
        // the datetime format in phpmyadmin is Y-m-d H:i:s
        $postDatetime = date('Y-m-d H:i:s', time());
        $postCourse = $this->request->getPost('postCourse');
        $postContent = $this->request->getPost('postContent');

        $checkTableExistModel = new Check_Databse_Exists_model();
        $checkPostTableExist = $checkTableExistModel->checkAndCreatePostTable();
        
        $model = new Create_Post_model();
        $insertPost = $model->insert_post($postUsername, $postTitle, $postDatetime, $postCourse, $postContent);

        $data['postUsername'] = $postUsername;

        echo view('template/header');
        echo view('upload_form', $data);
        echo view('template/footer');
        

    }
    
}