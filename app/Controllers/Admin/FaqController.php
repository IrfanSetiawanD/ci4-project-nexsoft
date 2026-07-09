<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaqModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class FaqController extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    /**
     * FAQ List
     */
    public function index()
    {
        $faqs = $this->faqModel
            ->orderBy('display_order', 'ASC')
            ->findAll();

        return view('admin/faqs/index', [
            'title' => 'Manage FAQ',
            'faqs'  => $faqs,
        ]);
    }

    /**
     * Create Form
     */
    public function create()
    {
        return view('admin/faqs/create', [
            'title' => 'Create FAQ',
        ]);
    }

    /**
     * Store FAQ
     */
    public function store()
    {
        $this->faqModel->save([
            'question'      => $this->request->getPost('question'),
            'answer'        => $this->request->getPost('answer'),
            'display_order' => $this->request->getPost('display_order'),
            'status'        => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/faqs')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }

    /**
     * Edit Form
     */
    public function edit($id)
    {
        $faq = $this->faqModel->find($id);

        if (!$faq) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/faqs/edit', [
            'title' => 'Edit FAQ',
            'faq'   => $faq,
        ]);
    }

    /**
     * Update FAQ
     */
    public function update($id)
    {
        $this->faqModel->update($id, [
            'question'      => $this->request->getPost('question'),
            'answer'        => $this->request->getPost('answer'),
            'display_order' => $this->request->getPost('display_order'),
            'status'        => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/faqs')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    /**
     * Delete FAQ
     */
    public function delete($id)
    {
        $this->faqModel->delete($id);

        return redirect()->to('/admin/faqs')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}
