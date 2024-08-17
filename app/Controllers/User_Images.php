<?php
namespace App\Controllers;

use App\Models\Upload_model;
use CodeIgniter\Config\Services;

class User_Images extends BaseController {

    public function index() {
        $sessionUsername = session()->get('username');
        $model = model('App\Models\Upload_model');

        $files = $model->getFileNameByUser($sessionUsername);

        $data['files'] = [];

        $imageService = Services::image();
        foreach ($files as $file) {
            $fullPath = WRITEPATH . 'uploads/' . $file;

            // Check if the file exists before adding it to the array
            if (file_exists($fullPath)) {
                $imageResized = $imageService->withFile($fullPath)->resize(426, 240)->save($fullPath);
                $data['files'][] = $file;
            } else {
                $data['files'][] = null;
            }
        }

        if (isset($sessionUsername)) {
            echo view('template/header');
            echo view('user_images', $data);
            echo view('template/footer');
        } else {
            return redirect()->to(base_url('login'));
        }
    }
}