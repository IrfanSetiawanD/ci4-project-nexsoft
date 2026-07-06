<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table            = 'testimonials';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'client_name',
        'company',
        'position',
        'photo',
        'rating',
        'testimonial',
        'status',
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'client_name' => 'required|min_length[3]|max_length[150]',
        'rating'      => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
        'testimonial' => 'required',
        'status'      => 'permit_empty|in_list[active,inactive]',
    ];

    protected $validationMessages = [
        'client_name' => [
            'required' => 'Nama klien wajib diisi.',
        ],
        'rating' => [
            'required' => 'Rating wajib diisi.',
        ],
        'testimonial' => [
            'required' => 'Testimoni wajib diisi.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
