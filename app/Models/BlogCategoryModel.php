<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogCategoryModel extends Model
{
    protected $table            = 'blog_categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'name',
        'slug',
        'description',
        'status',
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'name'   => 'required|min_length[3]|max_length[100]',
        'slug'   => 'required|is_unique[blog_categories.slug,id,{id}]',
        'status' => 'permit_empty|in_list[active,inactive]',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Nama kategori wajib diisi.',
        ],
        'slug' => [
            'required'  => 'Slug wajib diisi.',
            'is_unique' => 'Slug sudah digunakan.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
