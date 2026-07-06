<?php

namespace App\Models;

use CodeIgniter\Model;

class LicenseTypeModel extends Model
{
    protected $table            = 'license_types';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'name',
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
        'name'   => 'required|min_length[2]|max_length[100]',
        'status' => 'required|in_list[active,inactive]',
    ];

    protected $validationMessages = [
        'name' => [
            'required'   => 'License type name is required.',
            'min_length' => 'License type name must be at least 2 characters.',
            'max_length' => 'License type name must not exceed 100 characters.',
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
