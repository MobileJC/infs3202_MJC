<?php

namespace App\Controllers;

use App\Models\Upload_model;
use App\Models\Check_Database_Exists_model;

class Upload extends BaseController
{
    public function index()
    {
        $username['sessionUsername'] = session()->get('username');
        if (isset($username['sessionUsername'])) {
            echo view('template/header');
            echo view('upload_form', $username);
            echo view('template/footer');
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function upload_file()
    {
        $data['errors'] = "";
        $username = session()->get('username');
        $checkExistModel = new Check_Databse_Exists_model();
        $checkUserUploadsExist = $checkExistModel->checkAndCreateUploadsTable();
        $title = $this->request->getPost('title');
        $files = $this->request->getFiles();

        $uploaded_files = [];

        foreach ($files['userfile'] as $file) {
            if (!$file->isValid()) {
                $data['errors'] .= "<div class=\"alert alert-danger\" role=\"alert\"> Invalid file! </div> ";
            } else {
                $extension = $file->getClientExtension();
                $newFilename = uniqid() . '_' . $file->getName();
                $file->move(WRITEPATH . 'uploads', $newFilename);
                $model = model('App\Models\Upload_model');
                $check = $model->upload($username, $title, $newFilename);
                if ($check) {
                    $uploaded_files[] = $newFilename;
                } else {
                    $data['errors'] .= "<div class=\"alert alert-danger\" role=\"alert\"> Upload failed for file " . $newFilename . "!! </div> ";
                }
            }
        }

        $data['uploaded_files'] = $uploaded_files;

        echo view('template/header');
        echo view('upload_success', $data);
        echo view('template/footer');
    }
}