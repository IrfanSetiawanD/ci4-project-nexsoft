<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PrincipalModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PrincipalController extends BaseController
{
    protected PrincipalModel $principalModel;

    public function __construct()
    {
        $this->principalModel = new PrincipalModel();
    }

    /**
     * Display all principals
     */
    public function index()
    {
        return view('admin/principals/index', [
            'title'      => 'Principals',
            'principals' => $this->principalModel
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin/principals/create', [
            'title' => 'Add Principal',
        ]);
    }

    /**
     * Store principal
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[150]',
            'slug' => 'required|is_unique[principals.slug]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->principalModel->save([
            'name'        => $this->request->getPost('name'),
            'slug'        => $this->request->getPost('slug'),
            'logo'        => $this->request->getPost('logo'),
            'website'     => $this->request->getPost('website'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/principals')
            ->with('success', 'Principal created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $principal = $this->principalModel->find($id);

        if (! $principal) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/principals/edit', [
            'title'     => 'Edit Principal',
            'principal' => $principal,
        ]);
    }

    /**
     * Update principal
     */
    public function update($id)
    {
        $principal = $this->principalModel->find($id);

        if (! $principal) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[150]',
            'slug' => "required|is_unique[principals.slug,id,{$id}]",
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->principalModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'slug'        => $this->request->getPost('slug'),
            'logo'        => $this->request->getPost('logo'),
            'website'     => $this->request->getPost('website'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/principals')
            ->with('success', 'Principal updated successfully.');
    }

    /**
     * Delete principal
     */
    public function delete($id)
    {
        $principal = $this->principalModel->find($id);

        if (! $principal) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->principalModel->delete($id);

        return redirect()->to('/admin/principals')
            ->with('success', 'Principal deleted successfully.');
    }
}
