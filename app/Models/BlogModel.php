<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table            = 'blogs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'blog_category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author',
        'is_featured',
        'status',
        'published_at',
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'blog_category_id' => 'required|integer',
        'title'            => 'required|min_length[5]|max_length[255]',
        'slug'             => 'required|is_unique[blogs.slug,id,{id}]',
        'content'          => 'required',
        'author'           => 'permit_empty|max_length[100]',
        'is_featured'      => 'permit_empty|in_list[0,1]',
        'status'           => 'permit_empty|in_list[draft,published]',
    ];

    protected $validationMessages = [
        'blog_category_id' => [
            'required' => 'Kategori blog wajib dipilih.',
        ],
        'title' => [
            'required' => 'Judul blog wajib diisi.',
        ],
        'slug' => [
            'required'  => 'Slug wajib diisi.',
            'is_unique' => 'Slug sudah digunakan.',
        ],
        'content' => [
            'required' => 'Konten blog wajib diisi.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
