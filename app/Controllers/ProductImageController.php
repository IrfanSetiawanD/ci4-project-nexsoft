<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductImageModel;
use App\Models\ProductModel;

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
     * Menampilkan semua gambar produk
     */
    public function index()
    {
        $data['images'] = $this->productImageModel
            ->select('product_images.*, products.name AS product_name')
            ->join('products', 'products.id = product_images.product_id')
            ->orderBy('product_images.sort_order', 'ASC')
            ->findAll();

        return view('admin/product_images/index', $data);
    }

    /**
     * Form tambah gambar produk
     */
    public function create()
    {
        $data['products'] = $this->productModel
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('admin/product_images/create', $data);
    }

    /**
     * Simpan gambar produk
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
            ->with('success', 'Gambar produk berhasil ditambahkan.');
    }

    /**
     * Form edit gambar produk
     */
    public function edit($id)
    {
        $data = [
            'image' => $this->productImageModel->find($id),
            'products' => $this->productModel
                ->orderBy('name', 'ASC')
                ->findAll(),
        ];

        if (!$data['image']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/product_images/edit', $data);
    }

    /**
     * Update gambar produk
     */
    public function update($id)
    {
        $this->productImageModel->update($id, [
            'product_id' => $this->request->getPost('product_id'),
            'image'      => $this->request->getPost('image'),
            'alt_text'   => $this->request->getPost('alt_text'),
            'sort_order' => $this->request->getPost('sort_order'),
            'is_primary' => $this->request->getPost('is_primary') ? 1 : 0,
        ]);

        return redirect()->to('/admin/product-images')
            ->with('success', 'Gambar produk berhasil diperbarui.');
    }

    /**
     * Hapus gambar produk
     */
    public function delete($id)
    {
        $this->productImageModel->delete($id);

        return redirect()->to('/admin/product-images')
            ->with('success', 'Gambar produk berhasil dihapus.');
    }
}
