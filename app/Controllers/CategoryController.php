<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Display all categories
     */
    public function index()
    {
        $data = [
            'title'      => 'Categories',
            'categories' => $this->categoryModel
                ->orderBy('id', 'DESC')
                ->findAll(),
        ];

        return view('admin/categories/index', $data);
    }

    /**
     * Show create form
     */
    public function create()
    {
        $data = [
            'title' => 'Add Category',
        ];

        return view('admin/categories/create', $data);
    }

    /**
     * Store new category
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'slug' => 'required|is_unique[categories.slug]',
        ];

        if (! $this->validate($rules)) {
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
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'    => 'Edit Category',
            'category' => $category,
        ];

        return view('admin/categories/edit', $data);
    }

    /**
     * Update category
     */
    public function update($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'slug' => "required|is_unique[categories.slug,id,{$id}]",
        ];

        if (! $this->validate($rules)) {
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
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Delete category
     */
    public function delete($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->categoryModel->delete($id);

        return redirect()->back()
            ->with('success', 'Category deleted successfully.');
    }
}
