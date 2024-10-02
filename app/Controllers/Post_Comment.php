<?php

namespace App\Controllers;

use App\Models\Post_Comment_model;
use App\Models\Check_Database_Exists_model;


class Post_Comment extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {

        $checkExistModel = new Check_Databse_Exists_model();
        $checkCommentTableExist = $checkExistModel->checkAndCreateCommentTable();
        $model = new Post_Comment_model();
        $posts = $model->getFromPost();
        $comments = $model->getFromComment();
        $data = [
            'posts' => $posts,
            'comments' => $comments,
        ];
        $sessionUsername = session()->get('username');
        if (isset($sessionUsername)){
            echo view('template/header');
            echo view('post_comment', $data);
            echo view('template/footer');
        } else {
            return redirect()->to(base_url('login'));
        }      
    }

    public function insert_comment()
    {
        date_default_timezone_set('Australia/Brisbane');
        
        $postID = $this->request->getPost('postID');
        $session = session();
        $commentUsername = $session->get('username');
        $commentContent = $this->request->getPost('commentContent');
        $commentDateTime = date('Y-m-d H:i:s', time());

        """

        """
        if (empty($postID)) {
            echo view('template/header');
            echo view('comment_empty');
            echo view('template/footer');
        } else {
            $model = new Post_Comment_model();
            $model->insertComment($postID, $commentUsername, $commentContent, $commentDateTime);

            // Redirect back to the post comment page
            return redirect()->to(base_url().'post_comment');
        }

    }
}