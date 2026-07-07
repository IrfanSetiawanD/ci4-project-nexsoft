<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\BlogCategoryModel;

class BlogController extends BaseController
{
    protected $blogModel;
    protected $blogCategoryModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->blogCategoryModel = new BlogCategoryModel();
    }

    /**
     * Menampilkan semua blog
     */
    public function index()
    {
        $data['blogs'] = $this->blogModel
            ->select('blogs.*, blog_categories.name AS category_name')
            ->join('blog_categories', 'blog_categories.id = blogs.blog_category_id')
            ->orderBy('blogs.created_at', 'DESC')
            ->findAll();

        return view('admin/blogs/index', $data);
    }

    /**
     * Form tambah blog
     */
    public function create()
    {
        $data['categories'] = $this->blogCategoryModel
            ->where('status', 'active')
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('admin/blogs/create', $data);
    }

    /**
     * Simpan blog
     */
    public function store()
    {
        $this->blogModel->save([
            'blog_category_id' => $this->request->getPost('blog_category_id'),
            'title'            => $this->request->getPost('title'),
            'slug'             => url_title($this->request->getPost('title'), '-', true),
            'excerpt'          => $this->request->getPost('excerpt'),
            'content'          => $this->request->getPost('content'),
            'featured_image'   => $this->request->getPost('featured_image'),
            'author'           => $this->request->getPost('author'),
            'is_featured'      => $this->request->getPost('is_featured') ? 1 : 0,
            'status'           => $this->request->getPost('status'),
            'published_at'     => $this->request->getPost('published_at'),
        ]);

        return redirect()->to('/admin/blogs')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Form edit blog
     */
    public function edit($id)
    {
        $data['blog'] = $this->blogModel->find($id);

        if (!$data['blog']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['categories'] = $this->blogCategoryModel
            ->where('status', 'active')
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('admin/blogs/edit', $data);
    }

    /**
     * Update blog
     */
    public function update($id)
    {
        $this->blogModel->update($id, [
            'blog_category_id' => $this->request->getPost('blog_category_id'),
            'title'            => $this->request->getPost('title'),
            'slug'             => url_title($this->request->getPost('title'), '-', true),
            'excerpt'          => $this->request->getPost('excerpt'),
            'content'          => $this->request->getPost('content'),
            'featured_image'   => $this->request->getPost('featured_image'),
            'author'           => $this->request->getPost('author'),
            'is_featured'      => $this->request->getPost('is_featured') ? 1 : 0,
            'status'           => $this->request->getPost('status'),
            'published_at'     => $this->request->getPost('published_at'),
        ]);

        return redirect()->to('/admin/blogs')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus blog
     */
    public function delete($id)
    {
        $this->blogModel->delete($id);

        return redirect()->to('/admin/blogs')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
