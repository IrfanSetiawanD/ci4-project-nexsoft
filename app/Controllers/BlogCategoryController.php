<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogCategoryModel;

class BlogCategoryController extends BaseController
{
    protected $blogCategoryModel;

    public function __construct()
    {
        $this->blogCategoryModel = new BlogCategoryModel();
    }

    /**
     * Menampilkan semua kategori blog
     */
    public function index()
    {
        $data['categories'] = $this->blogCategoryModel
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('admin/blog_categories/index', $data);
    }

    /**
     * Form tambah kategori blog
     */
    public function create()
    {
        return view('admin/blog_categories/create');
    }

    /**
     * Simpan kategori blog
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
            ->with('success', 'Kategori blog berhasil ditambahkan.');
    }

    /**
     * Form edit kategori blog
     */
    public function edit($id)
    {
        $data['category'] = $this->blogCategoryModel->find($id);

        if (!$data['category']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/blog_categories/edit', $data);
    }

    /**
     * Update kategori blog
     */
    public function update($id)
    {
        $this->blogCategoryModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'slug'        => url_title($this->request->getPost('name'), '-', true),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/blog-categories')
            ->with('success', 'Kategori blog berhasil diperbarui.');
    }

    /**
     * Hapus kategori blog
     */
    public function delete($id)
    {
        $this->blogCategoryModel->delete($id);

        return redirect()->to('/admin/blog-categories')
            ->with('success', 'Kategori blog berhasil dihapus.');
    }
}
