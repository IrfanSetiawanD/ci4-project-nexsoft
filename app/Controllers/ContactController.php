<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class ContactController extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    /**
     * Contact Page
     */
    public function index()
    {
        $setting = $this->settingModel->first();

        return view('pages/contact', [
            'title'             => 'Contact Us',
            'meta_description'  => 'Contact NexSoft Commerce.',
            'meta_keywords'     => 'contact, nexsoft, software',
            'setting'           => $setting,
        ]);
    }

    /**
     * Contact Form Submit
     */
    public function send()
    {
        $rules = [
            'name'    => 'required|min_length[3]',
            'email'   => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Nanti bisa disimpan ke database
        // atau dikirim ke email menggunakan Email Service

        return redirect()->back()->with(
            'success',
            'Pesan berhasil dikirim. Tim kami akan segera menghubungi Anda.'
        );
    }
}
