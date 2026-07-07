<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class SettingController extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    /**
     * Menampilkan halaman pengaturan website
     */
    public function index()
    {
        $data['setting'] = $this->settingModel->first();

        return view('admin/settings/index', $data);
    }

    /**
     * Simpan atau update pengaturan website
     */
    public function save()
    {
        $setting = $this->settingModel->first();

        $data = [
            'company_name'     => $this->request->getPost('company_name'),
            'tagline'          => $this->request->getPost('tagline'),
            'logo'             => $this->request->getPost('logo'),
            'favicon'          => $this->request->getPost('favicon'),
            'email'            => $this->request->getPost('email'),
            'phone'            => $this->request->getPost('phone'),
            'whatsapp'         => $this->request->getPost('whatsapp'),
            'address'          => $this->request->getPost('address'),
            'google_maps'      => $this->request->getPost('google_maps'),
            'facebook'         => $this->request->getPost('facebook'),
            'instagram'        => $this->request->getPost('instagram'),
            'linkedin'         => $this->request->getPost('linkedin'),
            'youtube'          => $this->request->getPost('youtube'),
            'meta_title'       => $this->request->getPost('meta_title'),
            'meta_description' => $this->request->getPost('meta_description'),
            'meta_keywords'    => $this->request->getPost('meta_keywords'),
        ];

        if ($setting) {
            $this->settingModel->update($setting['id'], $data);
        } else {
            $this->settingModel->insert($data);
        }

        return redirect()->to('/admin/settings')
            ->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
