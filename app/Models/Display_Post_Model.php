<?php

namespace App\Models;

use CodeIgniter\Model;

class Display_Post_model extends Model
{
    public function getAllPost() {
        $db = \Config\Database::connect();
        $builder = $db->table('post');
        $query = $builder->get();
        return $query->getResult();
    }
}