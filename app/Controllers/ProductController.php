<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\LicenseTypeModel;
use App\Models\PrincipalModel;
use App\Models\ProductModel;
use App\Models\SettingModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $brandModel;
    protected $licenseTypeModel;
    protected $principalModel;
    protected $settingModel;

    public function __construct()
    {
        $this->productModel      = new ProductModel();
        $this->categoryModel     = new CategoryModel();
        $this->brandModel        = new BrandModel();
        $this->licenseTypeModel  = new LicenseTypeModel();
        $this->principalModel    = new PrincipalModel();
        $this->settingModel      = new SettingModel();
    }

    /**
     * Product List
     */
    public function index()
    {
        $setting = $this->settingModel->first();

        $products = $this->productModel
            ->select("
                products.*,
                categories.name AS category_name,
                brands.name AS brand_name,
                principals.name AS principal_name
            ")
            ->join('categories', 'categories.id = products.category_id')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('principals', 'principals.id = products.principal_id')
            ->where('products.status', 'active')
            ->orderBy('products.is_featured', 'DESC')
            ->orderBy('products.name', 'ASC')
            ->findAll();

        return view('pages/products', [
            'title'            => 'Products',
            'meta_description' => $setting['meta_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,

            'categories'       => $this->categoryModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'products'         => $products,
        ]);
    }

    /**
     * Product Detail
     */
    public function show($slug)
    {
        $setting = $this->settingModel->first();

        $product = $this->productModel
            ->select("
                products.*,
                categories.name AS category_name,
                brands.name AS brand_name,
                license_types.name AS license_type_name,
                principals.name AS principal_name
            ")
            ->join('categories', 'categories.id = products.category_id')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('license_types', 'license_types.id = products.license_type_id')
            ->join('principals', 'principals.id = products.principal_id')
            ->where('products.slug', $slug)
            ->where('products.status', 'active')
            ->first();

        if (!$product) {
            throw PageNotFoundException::forPageNotFound();
        }

        $relatedProducts = $this->productModel
            ->where('category_id', $product['category_id'])
            ->where('id !=', $product['id'])
            ->where('status', 'active')
            ->orderBy('is_featured', 'DESC')
            ->orderBy('name', 'ASC')
            ->limit(4)
            ->findAll();

        return view('pages/product-detail', [
            'title'            => $product['name'],
            'meta_description' => $product['short_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,
            'product'          => $product,
            'relatedProducts'  => $relatedProducts,
        ]);
    }

    /**
     * Products by Category
     */
    public function category($slug)
    {
        $setting = $this->settingModel->first();

        $category = $this->categoryModel
            ->where('slug', $slug)
            ->first();

        if (!$category) {
            throw PageNotFoundException::forPageNotFound();
        }

        $products = $this->productModel
            ->where('category_id', $category['id'])
            ->where('status', 'active')
            ->orderBy('is_featured', 'DESC')
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('pages/products', [
            'title'            => $category['name'],
            'meta_description' => $setting['meta_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,

            'categories'       => $this->categoryModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'category'         => $category,
            'products'         => $products,
        ]);
    }
}
