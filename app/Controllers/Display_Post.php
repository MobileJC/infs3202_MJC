<?php

namespace App\Controllers;
use App\Models\Display_Post_Model;

class Display_Post extends BaseController
{
    public function index()
    {
        $model = new Display_Post_Model();
        $allPost['data'] = $model->getAllPost();
        $sessionUsername = session()->get('username');
        
        if(isset($sessionUsername)){
            echo view('template/header');
            echo view("display_post", $allPost);
            echo view('template/footer');
        } else {
            return redirect()->to(base_url('login'));
        }

        
    }
    
    public function search()
    {
        $model = new Display_Post_Model();
        $search = $this->request->getVar('search');

        $posts = $model->searchPost($search);

        $data = [
            'allPost' => ['data' => $posts]
        ];

        echo view('template/header');
        echo view("display_post", $data);
        echo view('template/footer');
    }

    public function autocomplete()
    {
        $model = new Display_Post_Model();
        $search = $this->request->getVar('search');

        $result = $model->searchPost($search);

        $data = [];

        foreach ($result as $row) {
            $data[] = [
                'id'    => $row['id'],
                'value' => $row['title']
            ];
        }

        echo json_encode($data);
    }
}