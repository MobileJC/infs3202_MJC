<?php

namespace App\Models;

use CodeIgniter\Model;

class Upload extends Model
{
    public function upload($username, $title, $filename)
    {
        $file = [
            'username'  => $username,
            'title'     => $title,
            'filename'  => $filename,
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('Uploads');
        if ($builder->insert($file)) {
            return true;
        } else {
            return false;
        }
    }

    public function getFileNameByUser($username) {
        $db = \Config\Database::connect();
        $builder = $db->table('Uploads')->select('filename')->where('username', $username);
        $query = $builder->get();
        if ($query->resultID->num_rows > 0) {
            $imageFiles = [];
            foreach ($query->getResultArray() as $row) {
                $imageFiles[] = $row['filename'];
            }
            return $imageFiles;
        } else {
            return [];
        }
    }
        
}