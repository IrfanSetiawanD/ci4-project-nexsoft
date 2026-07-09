<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\BlogCategoryModel;
use App\Models\SettingModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class BlogController extends BaseController
{
    protected $blogModel;
    protected $blogCategoryModel;
    protected $settingModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->blogCategoryModel = new BlogCategoryModel();
        $this->settingModel = new SettingModel();
    }

    /**
     * Blog List
     */
    public function index()
    {
        $setting = $this->settingModel->first();

        $blogs = $this->blogModel
            ->select("
                blogs.*,
                blog_categories.name AS category_name,
                blog_categories.slug AS category_slug
            ")
            ->join('blog_categories', 'blog_categories.id = blogs.blog_category_id')
            ->where('blogs.status', 'published')
            ->orderBy('blogs.published_at', 'DESC')
            ->findAll();

        return view('pages/blog', [
            'title'            => 'Blog',
            'meta_description' => $setting['meta_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,
            'blogs'            => $blogs,
        ]);
    }

    /**
     * Blog Detail
     */
    public function show($slug)
    {
        $setting = $this->settingModel->first();

        $blog = $this->blogModel
            ->select("
                blogs.*,
                blog_categories.name AS category_name,
                blog_categories.slug AS category_slug
            ")
            ->join('blog_categories', 'blog_categories.id = blogs.blog_category_id')
            ->where('blogs.slug', $slug)
            ->where('blogs.status', 'published')
            ->first();

        if (!$blog) {
            throw PageNotFoundException::forPageNotFound();
        }

        $relatedBlogs = $this->blogModel
            ->where('blog_category_id', $blog['blog_category_id'])
            ->where('id !=', $blog['id'])
            ->where('status', 'published')
            ->orderBy('published_at', 'DESC')
            ->limit(3)
            ->findAll();

        return view('pages/blog-detail', [
            'title'            => $blog['title'],
            'meta_description' => $blog['excerpt'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,
            'blog'             => $blog,
            'relatedBlogs'     => $relatedBlogs,
        ]);
    }

    /**
     * Blog by Category
     */
    public function category($slug)
    {
        $setting = $this->settingModel->first();

        $category = $this->blogCategoryModel
            ->where('slug', $slug)
            ->where('status', 'active')
            ->first();

        if (!$category) {
            throw PageNotFoundException::forPageNotFound();
        }

        $blogs = $this->blogModel
            ->where('blog_category_id', $category['id'])
            ->where('status', 'published')
            ->orderBy('published_at', 'DESC')
            ->findAll();

        return view('pages/blog', [
            'title'            => $category['name'],
            'meta_description' => $setting['meta_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,
            'category'         => $category,
            'blogs'            => $blogs,
        ]);
    }
}
