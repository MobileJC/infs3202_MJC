<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Email\Email;

class Create_Account_model extends Model
{
    public function check_account_exist($username)
    {   $db = \Config\Database::connect();
        
        # select count(*) from users where username = $username;
        $builder = $db->table('users')->select('username')->where('username', $username);
        $query = $builder->countAllResults();
        if ($query == 0) {
            return false;
        }else {            
            return true;
        }
    }
    
    public function create_account($username, $password, $email, $sq1, $sq2, $sq3)
    {
        $verification_token = bin2hex(random_bytes(16));
        $data = [
            'username'              => $username,
            'password'              => $password,
            'email'                 => $email,
            'security_question_1'   => $sq1,
            'security_question_2'   => $sq2,
            'security_question_3'   => $sq3,
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('users')->insert($data);
    }

    public function get_user_by_token($token)
    {
    $db = \Config\Database::connect();
    $builder = $db->table('users')->where('verification_token', $token);
    $query = $builder->get()->getRowArray();
    return $query;
    }

    public function verify_account($user_id)
    {
    $db = \Config\Database::connect();
    $builder = $db->table('users')->where('id', $user_id)->update(['email_verified' => 1]);
    }
}
