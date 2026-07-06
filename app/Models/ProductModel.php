<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'category_id',
        'brand_id',
        'license_type_id',
        'principal_id',
        'name',
        'slug',
        'sku',
        'short_description',
        'description',
        'price',
        'image',
        'stock_status',
        'status',
        'is_featured',
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
        'category_id'     => 'required|is_natural_no_zero',
        'brand_id'        => 'required|is_natural_no_zero',
        'license_type_id' => 'required|is_natural_no_zero',
        'principal_id'    => 'required|is_natural_no_zero',

        'name'            => 'required|min_length[3]|max_length[255]',
        'slug'            => 'required|is_unique[products.slug,id,{id}]',

        'price'           => 'required|decimal',
        'stock_status'    => 'required|in_list[ready,preorder,out_of_stock]',
        'status'          => 'required|in_list[active,inactive]',
        'is_featured'     => 'permit_empty|in_list[0,1]',
    ];

    protected $validationMessages = [
        'category_id' => [
            'required'           => 'Category is required.',
            'is_natural_no_zero' => 'Please select a valid category.',
        ],
        'brand_id' => [
            'required'           => 'Brand is required.',
            'is_natural_no_zero' => 'Please select a valid brand.',
        ],
        'license_type_id' => [
            'required'           => 'License type is required.',
            'is_natural_no_zero' => 'Please select a valid license type.',
        ],
        'principal_id' => [
            'required'           => 'Principal is required.',
            'is_natural_no_zero' => 'Please select a valid principal.',
        ],
        'name' => [
            'required'   => 'Product name is required.',
            'min_length' => 'Product name must be at least 3 characters.',
            'max_length' => 'Product name must not exceed 255 characters.',
        ],
        'slug' => [
            'required'  => 'Slug is required.',
            'is_unique' => 'Slug already exists.',
        ],
        'price' => [
            'required' => 'Price is required.',
            'decimal'  => 'Price must be a valid decimal number.',
        ],
        'stock_status' => [
            'required' => 'Stock status is required.',
            'in_list'  => 'Invalid stock status.',
        ],
        'status' => [
            'required' => 'Status is required.',
            'in_list'  => 'Status must be active or inactive.',
        ],
        'is_featured' => [
            'in_list' => 'Featured value is invalid.',
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
