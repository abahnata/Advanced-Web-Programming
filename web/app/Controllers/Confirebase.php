<?php

namespace App\Controllers;

use Firebase\Firebase;

class Confirebase extends BaseController
{
    public function index()
    {
        $firebase = new Firebase('https://ugug-notif-default-rtdb.asia-southeast1.firebasedatabase.app/', 'AIzaSyD_vkN0-4JlmFUN9yx4IvLfhgdIiQKEMGc');
        $data = $firebase->get('/notes');
        echo json_encode($data);
    }

    public function add_data()
    {
        $firebase = new Firebase('https://ugug-notif-default-rtdb.asia-southeast1.firebasedatabase.app/', 'AIzaSyD_vkN0-4JlmFUN9yx4IvLfhgdIiQKEMGc');
        $data = [
            "judul" => "Rapat Saja",
            "peserta" => "5",
        ];
        $result = $firebase->push('/notes', $data);
        echo json_encode($result);
    }

    public function update_data()
    {
        $key = $this->request->getGet("key");
        $firebase = new Firebase('https://ugug-notif-default-rtdb.asia-southeast1.firebasedatabase.app/', 'AIzaSyD_vkN0-4JlmFUN9yx4IvLfhgdIiQKEMGc');
        $data = [
            "judul" => "Rapat Evaluasi 2",
            "peserta" => "10",
        ];
        $result = $firebase->update('/notes/' . $key, $data);
        echo json_encode($result);
    }

    public function delete_data()
    {
        $key = $this->request->getGet("key");
        $firebase = new Firebase('https://ugug-notif-default-rtdb.asia-southeast1.firebasedatabase.app/', 'AIzaSyD_vkN0-4JlmFUN9yx4IvLfhgdIiQKEMGc');
        $result = $firebase->delete('/notes/' . $key);
        echo json_encode($result);
    }
}
