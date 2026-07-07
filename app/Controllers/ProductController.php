<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\LicenseTypeModel;
use App\Models\PrincipalModel;

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
     * List Product
     */
    public function index()
    {
        $data['products'] = $this->productModel
            ->select('
                products.*,
                categories.name AS category_name,
                brands.name AS brand_name,
                license_types.name AS license_type_name,
                principals.name AS principal_name
            ')
            ->join('categories', 'categories.id = products.category_id')
            ->join('brands', 'brands.id = products.brand_id')
            ->join('license_types', 'license_types.id = products.license_type_id')
            ->join('principals', 'principals.id = products.principal_id')
            ->orderBy('products.id', 'DESC')
            ->findAll();

        return view('admin/products/index', $data);
    }

    /**
     * Form Tambah Product
     */
    public function create()
    {
        $data = [
            'categories'    => $this->categoryModel->findAll(),
            'brands'        => $this->brandModel->findAll(),
            'licenseTypes'  => $this->licenseTypeModel->findAll(),
            'principals'    => $this->principalModel->findAll(),
        ];

        return view('admin/products/create', $data);
    }

    /**
     * Simpan Product
     */
    public function store()
    {
        $this->productModel->save([
            'category_id'        => $this->request->getPost('category_id'),
            'brand_id'           => $this->request->getPost('brand_id'),
            'license_type_id'    => $this->request->getPost('license_type_id'),
            'principal_id'       => $this->request->getPost('principal_id'),
            'name'               => $this->request->getPost('name'),
            'slug'               => url_title($this->request->getPost('name'), '-', true),
            'sku'                => $this->request->getPost('sku'),
            'short_description'  => $this->request->getPost('short_description'),
            'description'        => $this->request->getPost('description'),
            'price'              => $this->request->getPost('price'),
            'image'              => null,
            'stock_status'       => $this->request->getPost('stock_status'),
            'status'             => $this->request->getPost('status'),
            'is_featured'        => $this->request->getPost('is_featured') ? 1 : 0,
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Product berhasil ditambahkan.');
    }

    /**
     * Form Edit
     */
    public function edit($id)
    {
        $data = [
            'product'       => $this->productModel->find($id),
            'categories'    => $this->categoryModel->findAll(),
            'brands'        => $this->brandModel->findAll(),
            'licenseTypes'  => $this->licenseTypeModel->findAll(),
            'principals'    => $this->principalModel->findAll(),
        ];

        if (!$data['product']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/products/edit', $data);
    }

    /**
     * Update Product
     */
    public function update($id)
    {
        $this->productModel->update($id, [
            'category_id'        => $this->request->getPost('category_id'),
            'brand_id'           => $this->request->getPost('brand_id'),
            'license_type_id'    => $this->request->getPost('license_type_id'),
            'principal_id'       => $this->request->getPost('principal_id'),
            'name'               => $this->request->getPost('name'),
            'slug'               => url_title($this->request->getPost('name'), '-', true),
            'sku'                => $this->request->getPost('sku'),
            'short_description'  => $this->request->getPost('short_description'),
            'description'        => $this->request->getPost('description'),
            'price'              => $this->request->getPost('price'),
            'stock_status'       => $this->request->getPost('stock_status'),
            'status'             => $this->request->getPost('status'),
            'is_featured'        => $this->request->getPost('is_featured') ? 1 : 0,
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Product berhasil diperbarui.');
    }

    /**
     * Hapus Product
     */
    public function delete($id)
    {
        $this->productModel->delete($id);

        return redirect()->to('/admin/products')
            ->with('success', 'Product berhasil dihapus.');
    }
}
