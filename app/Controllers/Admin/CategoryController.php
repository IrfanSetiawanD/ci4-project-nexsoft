<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Category List
     */
    public function index()
    {
        $categories = $this->categoryModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('admin/categories/index', [
            'title'      => 'Manage Categories',
            'categories' => $categories,
        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        return view('admin/categories/create', [
            'title' => 'Create Category',
        ]);
    }

    /**
     * Store Category
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'slug' => 'required|is_unique[categories.slug]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->categoryModel->save([
            'name'        => $this->request->getPost('name'),
            'slug'        => $this->request->getPost('slug'),
            'description' => $this->request->getPost('description'),
            'icon'        => $this->request->getPost('icon'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category berhasil ditambahkan.');
    }

    /**
     * Edit Form
     */
    public function edit($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/categories/edit', [
            'title'    => 'Edit Category',
            'category' => $category,
        ]);
    }

    /**
     * Update Category
     */
    public function update($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'slug' => "required|is_unique[categories.slug,id,{$id}]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->categoryModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'slug'        => $this->request->getPost('slug'),
            'description' => $this->request->getPost('description'),
            'icon'        => $this->request->getPost('icon'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category berhasil diperbarui.');
    }

    /**
     * Delete Category
     */
    public function delete($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->categoryModel->delete($id);

        return redirect()->to('/admin/categories')
            ->with('success', 'Category berhasil dihapus.');
    }
}
