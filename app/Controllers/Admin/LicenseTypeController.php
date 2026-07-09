<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LicenseTypeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class LicenseTypeController extends BaseController
{
    protected $licenseTypeModel;

    public function __construct()
    {
        $this->licenseTypeModel = new LicenseTypeModel();
    }

    /**
     * License Type List
     */
    public function index()
    {
        $licenseTypes = $this->licenseTypeModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('admin/license_types/index', [
            'title'        => 'Manage License Types',
            'licenseTypes' => $licenseTypes,
        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        return view('admin/license_types/create', [
            'title' => 'Create License Type',
        ]);
    }

    /**
     * Store License Type
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->licenseTypeModel->save([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/license-types')
            ->with('success', 'License Type berhasil ditambahkan.');
    }

    /**
     * Edit Form
     */
    public function edit($id)
    {
        $licenseType = $this->licenseTypeModel->find($id);

        if (!$licenseType) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/license_types/edit', [
            'title'       => 'Edit License Type',
            'licenseType' => $licenseType,
        ]);
    }

    /**
     * Update License Type
     */
    public function update($id)
    {
        $licenseType = $this->licenseTypeModel->find($id);

        if (!$licenseType) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->licenseTypeModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/license-types')
            ->with('success', 'License Type berhasil diperbarui.');
    }

    /**
     * Delete License Type
     */
    public function delete($id)
    {
        $licenseType = $this->licenseTypeModel->find($id);

        if (!$licenseType) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->licenseTypeModel->delete($id);

        return redirect()->to('/admin/license-types')
            ->with('success', 'License Type berhasil dihapus.');
    }
}
