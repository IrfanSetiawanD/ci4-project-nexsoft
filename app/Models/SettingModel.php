<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'company_name',
        'tagline',
        'logo',
        'favicon',
        'email',
        'phone',
        'whatsapp',
        'address',
        'google_maps',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'company_name' => 'required|max_length[255]',
        'email'        => 'permit_empty|valid_email',
        'phone'        => 'permit_empty|max_length[50]',
        'whatsapp'     => 'permit_empty|max_length[50]',
    ];

    protected $validationMessages = [
        'company_name' => [
            'required'   => 'Nama perusahaan wajib diisi.',
            'max_length' => 'Nama perusahaan maksimal 255 karakter.',
        ],
        'email' => [
            'valid_email' => 'Format email tidak valid.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
