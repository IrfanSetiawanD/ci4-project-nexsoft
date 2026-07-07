<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;

class TestimonialController extends BaseController
{
    protected $testimonialModel;

    public function __construct()
    {
        $this->testimonialModel = new TestimonialModel();
    }

    /**
     * Menampilkan semua testimonial
     */
    public function index()
    {
        $data['testimonials'] = $this->testimonialModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('admin/testimonials/index', $data);
    }

    /**
     * Form tambah testimonial
     */
    public function create()
    {
        return view('admin/testimonials/create');
    }

    /**
     * Simpan testimonial
     */
    public function store()
    {
        $this->testimonialModel->save([
            'client_name' => $this->request->getPost('client_name'),
            'company'     => $this->request->getPost('company'),
            'position'    => $this->request->getPost('position'),
            'photo'       => $this->request->getPost('photo'),
            'rating'      => $this->request->getPost('rating'),
            'testimonial' => $this->request->getPost('testimonial'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/testimonials')
            ->with('success', 'Testimonial berhasil ditambahkan.');
    }

    /**
     * Form edit testimonial
     */
    public function edit($id)
    {
        $data['testimonial'] = $this->testimonialModel->find($id);

        if (!$data['testimonial']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/testimonials/edit', $data);
    }

    /**
     * Update testimonial
     */
    public function update($id)
    {
        $this->testimonialModel->update($id, [
            'client_name' => $this->request->getPost('client_name'),
            'company'     => $this->request->getPost('company'),
            'position'    => $this->request->getPost('position'),
            'photo'       => $this->request->getPost('photo'),
            'rating'      => $this->request->getPost('rating'),
            'testimonial' => $this->request->getPost('testimonial'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/testimonials')
            ->with('success', 'Testimonial berhasil diperbarui.');
    }

    /**
     * Hapus testimonial
     */
    public function delete($id)
    {
        $this->testimonialModel->delete($id);

        return redirect()->to('/admin/testimonials')
            ->with('success', 'Testimonial berhasil dihapus.');
    }
}
