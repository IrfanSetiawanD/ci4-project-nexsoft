<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BrandModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class BrandController extends BaseController
{
    protected $brandModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
    }

    /**
     * Brand List
     */
    public function index()
    {
        $brands = $this->brandModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('admin/brands/index', [
            'title'  => 'Manage Brands',
            'brands' => $brands,
        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        return view('admin/brands/create', [
            'title' => 'Create Brand',
        ]);
    }

    /**
     * Store Brand
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'slug' => 'required|is_unique[brands.slug]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->brandModel->save([
            'name'        => $this->request->getPost('name'),
            'slug'        => $this->request->getPost('slug'),
            'logo'        => $this->request->getPost('logo'),
            'website'     => $this->request->getPost('website'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/brands')
            ->with('success', 'Brand berhasil ditambahkan.');
    }

    /**
     * Edit Form
     */
    public function edit($id)
    {
        $brand = $this->brandModel->find($id);

        if (!$brand) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/brands/edit', [
            'title' => 'Edit Brand',
            'brand' => $brand,
        ]);
    }

    /**
     * Update Brand
     */
    public function update($id)
    {
        $brand = $this->brandModel->find($id);

        if (!$brand) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'slug' => "required|is_unique[brands.slug,id,{$id}]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->brandModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'slug'        => $this->request->getPost('slug'),
            'logo'        => $this->request->getPost('logo'),
            'website'     => $this->request->getPost('website'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/brands')
            ->with('success', 'Brand berhasil diperbarui.');
    }

    /**
     * Delete Brand
     */
    public function delete($id)
    {
        $brand = $this->brandModel->find($id);

        if (!$brand) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->brandModel->delete($id);

        return redirect()->to('/admin/brands')
            ->with('success', 'Brand berhasil dihapus.');
    }
}
