<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\FakultasModel;

class Fakultas extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new FakultasModel();
        $data['fakultas'] = $model->orderBy('kode_fakultas', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new FakultasModel();
        $data = [
            'nama_fakultas' => $this->request->getVar('nama_fakultas'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Fakultas berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }



    // single user
    public function show($id = null)
    {
        $model = new FakultasModel();
        $data = $model->where('kode_fakultas', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new FakultasModel();
        $id = $this->request->getVar('kode_fakultas');
        $data = [
            'nama_fakultas' => $this->request->getVar('nama_fakultas'),
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Fakultas berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    // delete
    public function delete($id = null)
    {
        $model = new FakultasModel();
        $data = $model->where('kode_fakultas', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Fakultas berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}
