<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Profile_model extends Model
{
    public function getProfileAttr($username) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')->where('username', $username);
        $query = $builder->get();
        if ($query->getResult()) { 
            return $query->getRowArray();
        } else {
            return null;
        }
    }

    public function updateUser($username, $newPassword, $email) {
        $db = \Config\Database::connect();
        $builder = $db->table('users')->where('username', $username);
        $passwordOnly = [
            'password'  => $newPassword
        ];
        $passwordAndEmail = [
            'password'  => $newPassword,
            'email'     => $email
        ];
        // $query = $builder->update($data);
        if ($newPassword === null && $email === null) {
            return;
        } elseif ($email === null) {
            $query = $builder->update($passwordOnly);
        } else {
            $query = $builder->update($passwordAndEmail);
        }
    }

    public function getExistingPW($username) {
        $db = \Config\Database::connect();
        //$builder = $db->table('users')->select('password')->where('username', $username);
        $builder = $db->table('users')->where('username', $username);
        $query = $builder->get();
        $existingPW = $query->getRowArray();

        return $existingPW['password'];

    }
    
}