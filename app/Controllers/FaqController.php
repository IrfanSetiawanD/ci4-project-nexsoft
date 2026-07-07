<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class FaqController extends BaseController
{
    protected $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    /**
     * Menampilkan semua FAQ
     */
    public function index()
    {
        $data['faqs'] = $this->faqModel
            ->orderBy('display_order', 'ASC')
            ->findAll();

        return view('admin/faqs/index', $data);
    }

    /**
     * Form tambah FAQ
     */
    public function create()
    {
        return view('admin/faqs/create');
    }

    /**
     * Simpan FAQ
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
     * Form edit FAQ
     */
    public function edit($id)
    {
        $data['faq'] = $this->faqModel->find($id);

        if (!$data['faq']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/faqs/edit', $data);
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
     * Hapus FAQ
     */
    public function delete($id)
    {
        $this->faqModel->delete($id);

        return redirect()->to('/admin/faqs')
            ->with('success', 'FAQ berhasil dihapus.');
    }
}
