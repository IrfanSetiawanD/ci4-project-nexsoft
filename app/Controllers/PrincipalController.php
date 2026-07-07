<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PrincipalModel;

class PrincipalController extends BaseController
{
    protected $principalModel;

    public function __construct()
    {
        $this->principalModel = new PrincipalModel();
    }

    /**
     * Menampilkan semua principal
     */
    public function index()
    {
        $data['principals'] = $this->principalModel
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('admin/principals/index', $data);
    }

    /**
     * Form tambah principal
     */
    public function create()
    {
        return view('admin/principals/create');
    }

    /**
     * Simpan principal baru
     */
    public function store()
    {
        $this->principalModel->save([
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title($this->request->getPost('name'), '-', true),
            'logo'        => $this->request->getPost('logo'),
            'website'     => $this->request->getPost('website'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/principals')
            ->with('success', 'Principal berhasil ditambahkan.');
    }

    /**
     * Form edit principal
     */
    public function edit($id)
    {
        $data['principal'] = $this->principalModel->find($id);

        if (!$data['principal']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/principals/edit', $data);
    }

    /**
     * Update principal
     */
    public function update($id)
    {
        $this->principalModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title($this->request->getPost('name'), '-', true),
            'logo'        => $this->request->getPost('logo'),
            'website'     => $this->request->getPost('website'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/principals')
            ->with('success', 'Principal berhasil diperbarui.');
    }

    /**
     * Hapus principal
     */
    public function delete($id)
    {
        $this->principalModel->delete($id);

        return redirect()->to('/admin/principals')
            ->with('success', 'Principal berhasil dihapus.');
    }
}
