<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class TestimonialController extends BaseController
{
    protected $testimonialModel;

    public function __construct()
    {
        $this->testimonialModel = new TestimonialModel();
    }

    /**
     * Display all testimonials
     */
    public function index()
    {
        return view('admin/testimonials/index', [
            'title'        => 'Manage Testimonials',
            'testimonials' => $this->testimonialModel
                ->orderBy('id', 'DESC')
                ->findAll(),
        ]);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin/testimonials/create', [
            'title' => 'Create Testimonial',
        ]);
    }

    /**
     * Store testimonial
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
     * Show edit form
     */
    public function edit($id)
    {
        $testimonial = $this->testimonialModel->find($id);

        if (!$testimonial) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/testimonials/edit', [
            'title'       => 'Edit Testimonial',
            'testimonial' => $testimonial,
        ]);
    }

    /**
     * Update testimonial
     */
    public function update($id)
    {
        $testimonial = $this->testimonialModel->find($id);

        if (!$testimonial) {
            throw PageNotFoundException::forPageNotFound();
        }

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
     * Delete testimonial
     */
    public function delete($id)
    {
        $testimonial = $this->testimonialModel->find($id);

        if (!$testimonial) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->testimonialModel->delete($id);

        return redirect()->to('/admin/testimonials')
            ->with('success', 'Testimonial berhasil dihapus.');
    }
}
