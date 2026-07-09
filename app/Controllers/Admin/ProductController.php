<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\LicenseTypeModel;
use App\Models\PrincipalModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $brandModel;
    protected $licenseTypeModel;
    protected $principalModel;

    public function __construct()
    {
        $this->productModel      = new ProductModel();
        $this->categoryModel     = new CategoryModel();
        $this->brandModel        = new BrandModel();
        $this->licenseTypeModel  = new LicenseTypeModel();
        $this->principalModel    = new PrincipalModel();
    }

    /**
     * Product List
     */
    public function index()
    {
        $products = $this->productModel
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
            ->orderBy('products.id', 'DESC')
            ->findAll();

        return view('admin/products/index', [
            'title'    => 'Manage Products',
            'products' => $products,
        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        return view('admin/products/create', [
            'title'         => 'Create Product',
            'categories'    => $this->categoryModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'brands'        => $this->brandModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'licenseTypes'  => $this->licenseTypeModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'principals'    => $this->principalModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }

    /**
     * Store Product
     */
    public function store()
    {
        $this->productModel->save([
            'category_id'       => $this->request->getPost('category_id'),
            'brand_id'          => $this->request->getPost('brand_id'),
            'license_type_id'   => $this->request->getPost('license_type_id'),
            'principal_id'      => $this->request->getPost('principal_id'),
            'name'              => $this->request->getPost('name'),
            'slug'              => url_title($this->request->getPost('name'), '-', true),
            'sku'               => $this->request->getPost('sku'),
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'price'             => $this->request->getPost('price'),
            'image'             => null,
            'stock_status'      => $this->request->getPost('stock_status'),
            'status'            => $this->request->getPost('status'),
            'is_featured'       => $this->request->getPost('is_featured') ? 1 : 0,
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Product berhasil ditambahkan.');
    }

    /**
     * Edit Form
     */
    public function edit($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/products/edit', [
            'title'         => 'Edit Product',
            'product'       => $product,

            'categories'    => $this->categoryModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'brands'        => $this->brandModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'licenseTypes'  => $this->licenseTypeModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'principals'    => $this->principalModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }

    /**
     * Update Product
     */
    public function update($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->productModel->update($id, [
            'category_id'       => $this->request->getPost('category_id'),
            'brand_id'          => $this->request->getPost('brand_id'),
            'license_type_id'   => $this->request->getPost('license_type_id'),
            'principal_id'      => $this->request->getPost('principal_id'),
            'name'              => $this->request->getPost('name'),
            'slug'              => url_title($this->request->getPost('name'), '-', true),
            'sku'               => $this->request->getPost('sku'),
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'price'             => $this->request->getPost('price'),
            'stock_status'      => $this->request->getPost('stock_status'),
            'status'            => $this->request->getPost('status'),
            'is_featured'       => $this->request->getPost('is_featured') ? 1 : 0,
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Product berhasil diperbarui.');
    }

    /**
     * Delete Product
     */
    public function delete($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->productModel->delete($id);

        return redirect()->to('/admin/products')
            ->with('success', 'Product berhasil dihapus.');
    }
}
