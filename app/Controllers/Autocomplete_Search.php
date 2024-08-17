<?php

namespace App\Controllers;

class Autocomplete_Search extends BaseController
{
    public function index() {
        $data['errors']= "";
        echo view('template/header');
        echo view('', $data);
        echo view('template/footer');
    }

    public function ajaxSearch()
    {
        if ($this->request->isAJAX()) {
            $data = [];
            $db = \Config\Database::connect();
            $builder = $db->table('post')->like('postTitle', $this->request->getVar('q'))->select('post_id, postTitle as title');
            $query = $builder->get();
            $results = $query->getResultArray();

            foreach ($results as &$result) {
                $result['url'] = base_url('display_post?post_id=' . $result['post_id']);
            }

        return $this->response->setJSON($results);
        } else {
        return redirect()->back();
        }
    }
}