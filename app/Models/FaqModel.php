<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table            = 'faqs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'question',
        'answer',
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
        'question'      => 'required',
        'answer'        => 'required',
        'display_order' => 'permit_empty|integer',
        'status'        => 'permit_empty|in_list[active,inactive]',
    ];

    protected $validationMessages = [
        'question' => [
            'required' => 'Pertanyaan wajib diisi.',
        ],
        'answer' => [
            'required' => 'Jawaban wajib diisi.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
