<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'title',
        'slug',
        'icon',
        'short_description',
        'description',
        'display_order',
        'status',
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[150]',
        'slug'  => 'required|is_unique[services.slug,id,{id}]',
        'status' => 'permit_empty|in_list[active,inactive]',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Judul layanan wajib diisi.',
        ],
        'slug' => [
            'required'  => 'Slug wajib diisi.',
            'is_unique' => 'Slug sudah digunakan.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
