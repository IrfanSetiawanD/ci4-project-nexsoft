<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\BlogCategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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
     * Display all blogs
     */
    public function index()
    {
        $blogs = $this->blogModel
            ->select("
                blogs.*,
                blog_categories.name AS category_name
            ")
            ->join('blog_categories', 'blog_categories.id = blogs.blog_category_id')
            ->orderBy('blogs.created_at', 'DESC')
            ->findAll();

        return view('admin/blogs/index', [
            'title' => 'Manage Blogs',
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin/blogs/create', [
            'title' => 'Create Blog',
            'categories' => $this->blogCategoryModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }

    /**
     * Store blog
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
     * Show edit form
     */
    public function edit($id)
    {
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/blogs/edit', [
            'title' => 'Edit Blog',
            'blog' => $blog,
            'categories' => $this->blogCategoryModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }

    /**
     * Update blog
     */
    public function update($id)
    {
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            throw PageNotFoundException::forPageNotFound();
        }

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
     * Delete blog
     */
    public function delete($id)
    {
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->blogModel->delete($id);

        return redirect()->to('/admin/blogs')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}
