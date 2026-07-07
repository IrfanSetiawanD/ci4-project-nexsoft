<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LicenseTypeModel;

class LicenseTypeController extends BaseController
{
    protected $licenseTypeModel;

    public function __construct()
    {
        $this->licenseTypeModel = new LicenseTypeModel();
    }

    /**
     * Display all license types
     */
    public function index()
    {
        $data = [
            'title' => 'License Types',
            'licenseTypes' => $this->licenseTypeModel
                ->orderBy('id', 'DESC')
                ->findAll(),
        ];

        return view('admin/license_types/index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin/license_types/create', [
            'title' => 'Add License Type',
        ]);
    }

    /**
     * Store new license type
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
        ];

        if (! $this->validate($rules)) {
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
            ->with('success', 'License type created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $licenseType = $this->licenseTypeModel->find($id);

        if (! $licenseType) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/license_types/edit', [
            'title' => 'Edit License Type',
            'licenseType' => $licenseType,
        ]);
    }

    /**
     * Update license type
     */
    public function update($id)
    {
        $licenseType = $this->licenseTypeModel->find($id);

        if (! $licenseType) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
        ];

        if (! $this->validate($rules)) {
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
            ->with('success', 'License type updated successfully.');
    }

    /**
     * Delete license type
     */
    public function delete($id)
    {
        $licenseType = $this->licenseTypeModel->find($id);

        if (! $licenseType) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->licenseTypeModel->delete($id);

        return redirect()->back()
            ->with('success', 'License type deleted successfully.');
    }
}
