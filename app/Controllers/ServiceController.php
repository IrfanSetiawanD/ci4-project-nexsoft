<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class ServiceController extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    /**
     * Menampilkan semua service
     */
    public function index()
    {
        $data['services'] = $this->serviceModel
            ->orderBy('display_order', 'ASC')
            ->findAll();

        return view('admin/services/index', $data);
    }

    /**
     * Form tambah service
     */
    public function create()
    {
        return view('admin/services/create');
    }

    /**
     * Simpan service
     */
    public function store()
    {
        $this->serviceModel->save([
            'title'             => $this->request->getPost('title'),
            'slug'              => url_title($this->request->getPost('title'), '-', true),
            'icon'              => $this->request->getPost('icon'),
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'display_order'     => $this->request->getPost('display_order'),
            'status'            => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/services')
            ->with('success', 'Service berhasil ditambahkan.');
    }

    /**
     * Form edit service
     */
    public function edit($id)
    {
        $data['service'] = $this->serviceModel->find($id);

        if (!$data['service']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/services/edit', $data);
    }

    /**
     * Update service
     */
    public function update($id)
    {
        $this->serviceModel->update($id, [
            'title'             => $this->request->getPost('title'),
            'slug'              => url_title($this->request->getPost('title'), '-', true),
            'icon'              => $this->request->getPost('icon'),
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'display_order'     => $this->request->getPost('display_order'),
            'status'            => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/services')
            ->with('success', 'Service berhasil diperbarui.');
    }

    /**
     * Hapus service
     */
    public function delete($id)
    {
        $this->serviceModel->delete($id);

        return redirect()->to('/admin/services')
            ->with('success', 'Service berhasil dihapus.');
    }
}
