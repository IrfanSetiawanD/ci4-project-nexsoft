<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ProductImageController extends BaseController
{
    protected $productImageModel;
    protected $productModel;

    public function __construct()
    {
        $this->productImageModel = new ProductImageModel();
        $this->productModel      = new ProductModel();
    }

    /**
     * Product Image List
     */
    public function index()
    {
        $images = $this->productImageModel
            ->select("
                product_images.*,
                products.name AS product_name
            ")
            ->join('products', 'products.id = product_images.product_id')
            ->orderBy('products.name', 'ASC')
            ->orderBy('product_images.sort_order', 'ASC')
            ->findAll();

        return view('admin/product_images/index', [
            'title'  => 'Manage Product Images',
            'images' => $images,
        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        $products = $this->productModel
            ->where('status', 'active')
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('admin/product_images/create', [
            'title'    => 'Add Product Image',
            'products' => $products,
        ]);
    }

    /**
     * Store Product Image
     */
    public function store()
    {
        $this->productImageModel->save([
            'product_id' => $this->request->getPost('product_id'),
            'image'      => $this->request->getPost('image'),
            'alt_text'   => $this->request->getPost('alt_text'),
            'sort_order' => $this->request->getPost('sort_order'),
            'is_primary' => $this->request->getPost('is_primary') ? 1 : 0,
        ]);

        return redirect()->to('/admin/product-images')
            ->with('success', 'Product image berhasil ditambahkan.');
    }

    /**
     * Edit Form
     */
    public function edit($id)
    {
        $image = $this->productImageModel->find($id);

        if (!$image) {
            throw PageNotFoundException::forPageNotFound();
        }

        $products = $this->productModel
            ->where('status', 'active')
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('admin/product_images/edit', [
            'title'    => 'Edit Product Image',
            'image'    => $image,
            'products' => $products,
        ]);
    }

    /**
     * Update Product Image
     */
    public function update($id)
    {
        $image = $this->productImageModel->find($id);

        if (!$image) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->productImageModel->update($id, [
            'product_id' => $this->request->getPost('product_id'),
            'image'      => $this->request->getPost('image'),
            'alt_text'   => $this->request->getPost('alt_text'),
            'sort_order' => $this->request->getPost('sort_order'),
            'is_primary' => $this->request->getPost('is_primary') ? 1 : 0,
        ]);

        return redirect()->to('/admin/product-images')
            ->with('success', 'Product image berhasil diperbarui.');
    }

    /**
     * Delete Product Image
     */
    public function delete($id)
    {
        $image = $this->productImageModel->find($id);

        if (!$image) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->productImageModel->delete($id);

        return redirect()->to('/admin/product-images')
            ->with('success', 'Product image berhasil dihapus.');
    }
}
