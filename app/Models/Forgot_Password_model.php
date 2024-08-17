<?php

namespace App\Models;

use CodeIgniter\Model;

class Forgot_Password_model extends Model
{
    public function getUser($username) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')->where('username', $username);
        $query = $builder->get();
        $sq = $query->getRowArray();

        return $sq['username'];
    }
    
    
    public function getSQ1($username) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')->where('username', $username);
        $query = $builder->get();
        $sq = $query->getRowArray();

        return $sq['security_question_1'];
    }

    public function getSQ2($username) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')->where('username', $username);
        $query = $builder->get();
        $sq = $query->getRowArray();

        return $sq['security_question_2'];
    }

    public function getSQ3($username) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')->where('username', $username);
        $query = $builder->get();
        $sq = $query->getRowArray();

        return $sq['security_question_3'];
    }

    public function resetPassword($username, $newPasswordReset) {
        $data = ['password' => $newPasswordReset];
        $db = \Config\Database::connect();
        $builder = $db->table('users')->where('username', $username);
        $query = $builder->update($data);
        
    }
}