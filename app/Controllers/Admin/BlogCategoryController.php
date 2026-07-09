<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogCategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class BlogCategoryController extends BaseController
{
    protected $blogCategoryModel;

    public function __construct()
    {
        $this->blogCategoryModel = new BlogCategoryModel();
    }

    /**
     * Display all blog categories
     */
    public function index()
    {
        return view('admin/blog_categories/index', [
            'title'      => 'Manage Blog Categories',
            'categories' => $this->blogCategoryModel
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin/blog_categories/create', [
            'title' => 'Create Blog Category',
        ]);
    }

    /**
     * Store blog category
     */
    public function store()
    {
        $this->blogCategoryModel->save([
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title($this->request->getPost('name'), '-', true),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/blog-categories')
            ->with('success', 'Blog category berhasil ditambahkan.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $category = $this->blogCategoryModel->find($id);

        if (!$category) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/blog_categories/edit', [
            'title'    => 'Edit Blog Category',
            'category' => $category,
        ]);
    }

    /**
     * Update blog category
     */
    public function update($id)
    {
        $category = $this->blogCategoryModel->find($id);

        if (!$category) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->blogCategoryModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title($this->request->getPost('name'), '-', true),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/blog-categories')
            ->with('success', 'Blog category berhasil diperbarui.');
    }

    /**
     * Delete blog category
     */
    public function delete($id)
    {
        $category = $this->blogCategoryModel->find($id);

        if (!$category) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->blogCategoryModel->delete($id);

        return redirect()->to('/admin/blog-categories')
            ->with('success', 'Blog category berhasil dihapus.');
    }
}
