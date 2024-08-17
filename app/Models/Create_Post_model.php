<?php

namespace App\Models;

use CodeIgniter\Model;

class Create_Post_model extends Model
{
    public function insert_post($postUsername, $postTitle, $postDatetime, $postCourse, $postContent) {
        
        $data = [
            'postUsername'  => $postUsername,
            'postTitle'     => $postTitle,
            'postDatetime'  => $postDatetime,
            'postCourse'    => $postCourse,
            'postContent'   => $postContent,
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('post')->insert($data);

    }

}