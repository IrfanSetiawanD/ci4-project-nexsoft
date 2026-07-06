<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table            = 'brands';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'name',
        'slug',
        'logo',
        'website',
        'description',
        'status',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    /*
    |--------------------------------------------------------------------------
    | Dates
    |--------------------------------------------------------------------------
    */

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */

    protected $validationRules = [
        'name'    => 'required|min_length[2]|max_length[100]',
        'slug'    => 'required|is_unique[brands.slug,id,{id}]',
        'website' => 'permit_empty|valid_url_strict',
        'status'  => 'required|in_list[active,inactive]',
    ];

    protected $validationMessages = [
        'name' => [
            'required'   => 'Brand name is required.',
            'min_length' => 'Brand name must be at least 2 characters.',
            'max_length' => 'Brand name must not exceed 100 characters.',
        ],
        'slug' => [
            'required'  => 'Slug is required.',
            'is_unique' => 'Slug already exists.',
        ],
        'website' => [
            'valid_url_strict' => 'Website URL is not valid.',
        ],
        'status' => [
            'required' => 'Status is required.',
            'in_list'  => 'Status must be active or inactive.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    /*
    |--------------------------------------------------------------------------
    | Callbacks
    |--------------------------------------------------------------------------
    */

    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
