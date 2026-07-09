<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use App\Models\SettingModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ServiceController extends BaseController
{
    protected $serviceModel;
    protected $settingModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->settingModel = new SettingModel();
    }

    /**
     * Service List
     */
    public function index()
    {
        $setting = $this->settingModel->first();

        $services = $this->serviceModel
            ->where('status', 'active')
            ->orderBy('display_order', 'ASC')
            ->findAll();

        return view('pages/services', [
            'title'            => 'Services',
            'meta_description' => $setting['meta_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,
            'services'         => $services,
        ]);
    }

    /**
     * Service Detail
     */
    public function show($slug)
    {
        $setting = $this->settingModel->first();

        $service = $this->serviceModel
            ->where('slug', $slug)
            ->where('status', 'active')
            ->first();

        if (! $service) {
            throw PageNotFoundException::forPageNotFound();
        }

        $relatedServices = $this->serviceModel
            ->where('status', 'active')
            ->where('id !=', $service['id'])
            ->orderBy('display_order', 'ASC')
            ->limit(4)
            ->findAll();

        return view('pages/service-detail', [
            'title'            => $service['title'],
            'meta_description' => $service['short_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,
            'service'          => $service,
            'relatedServices'  => $relatedServices,
        ]);
    }
}
