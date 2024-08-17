<?php

namespace App\Models;

use CodeIgniter\Model;

class Post_Comment_model extends Model
{
    protected $table = 'comment';
    protected $allowedFields = ['postID', 'commentUsername', 'commentContent', 'commentDateTime'];


    public function getFromPost()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('post')->select('post_id, postTitle');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function insertComment($postID, $commentUsername, $commentContent, $commentDateTime)
    {
        $data = [
            'postID' => $postID,
            'commentUsername' => $commentUsername,
            'commentContent' => $commentContent,
            'commentDateTime' => $commentDateTime,
        ];
        $this->insert($data);
    }

    public function getFromComment()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table)
                    ->select('comment.commentUsername, comment.commentContent, comment.commentDateTime, post.postTitle')
                    ->join('post', 'post.post_id = comment.postID');
        $query = $builder->get();
        return $query->getResultArray();
    }
}