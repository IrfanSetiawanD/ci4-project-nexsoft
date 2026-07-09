<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ServiceController extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    /**
     * Display all services
     */
    public function index()
    {
        return view('admin/services/index', [
            'title'    => 'Manage Services',
            'services' => $this->serviceModel
                ->orderBy('display_order', 'ASC')
                ->findAll(),
        ]);
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin/services/create', [
            'title' => 'Create Service',
        ]);
    }

    /**
     * Store service
     */
    public function store()
    {
        $this->serviceModel->save([
            'title'             => $this->request->getPost('title'),
            'slug'              => url_title($this->request->getPost('title'), '-', true),
            'icon'              => $this->request->getPost('icon'),
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'display_order'     => $this->request->getPost('display_order'),
            'status'            => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/services')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $service = $this->serviceModel->find($id);

        if (! $service) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/services/edit', [
            'title'   => 'Edit Service',
            'service' => $service,
        ]);
    }

    /**
     * Update service
     */
    public function update($id)
    {
        $service = $this->serviceModel->find($id);

        if (! $service) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->serviceModel->update($id, [
            'title'             => $this->request->getPost('title'),
            'slug'              => url_title($this->request->getPost('title'), '-', true),
            'icon'              => $this->request->getPost('icon'),
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'display_order'     => $this->request->getPost('display_order'),
            'status'            => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/services')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Delete service
     */
    public function delete($id)
    {
        $service = $this->serviceModel->find($id);

        if (! $service) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->serviceModel->delete($id);

        return redirect()->to('/admin/services')
            ->with('success', 'Service deleted successfully.');
    }
}
