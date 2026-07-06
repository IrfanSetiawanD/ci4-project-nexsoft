<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImageModel extends Model
{
    protected $table            = 'product_images';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $protectFields = true;
    protected $allowedFields = [
        'product_id',
        'image',
        'alt_text',
        'sort_order',
        'is_primary',
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'product_id' => 'required|integer',
        'image'      => 'required|max_length[255]',
    ];

    protected $validationMessages = [];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
