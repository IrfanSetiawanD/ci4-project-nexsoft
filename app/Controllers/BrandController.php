<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BrandModel;

class BrandController extends BaseController
{
    protected $brandModel;

    public function __construct()
    {
        $this->brandModel = new BrandModel();
    }

    /**
     * Display all brands
     */
    public function index()
    {
        $data = [
            'title'  => 'Brands',
            'brands' => $this->brandModel
                ->orderBy('id', 'DESC')
                ->findAll(),
        ];

        return view('admin/brands/index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data = [
            'title' => 'Add Brand',
        ];

        return view('admin/brands/create', $data);
    }

    /**
     * Store new brand
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'slug' => 'required|is_unique[brands.slug]',
        ];

        if (! $this->validate($rules)) {
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
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $brand = $this->brandModel->find($id);

        if (! $brand) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => 'Edit Brand',
            'brand' => $brand,
        ];

        return view('admin/brands/edit', $data);
    }

    /**
     * Update brand
     */
    public function update($id)
    {
        $brand = $this->brandModel->find($id);

        if (! $brand) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'slug' => "required|is_unique[brands.slug,id,{$id}]",
        ];

        if (! $this->validate($rules)) {
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
            ->with('success', 'Brand updated successfully.');
    }

    /**
     * Delete brand
     */
    public function delete($id)
    {
        $brand = $this->brandModel->find($id);

        if (! $brand) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->brandModel->delete($id);

        return redirect()->back()
            ->with('success', 'Brand deleted successfully.');
    }
}
