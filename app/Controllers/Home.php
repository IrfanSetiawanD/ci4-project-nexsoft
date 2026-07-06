<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'NexSoft Commerce | Digital Software Solution',
            'meta_description' => 'NexSoft Commerce menyediakan software original.',
            'meta_keywords' => 'software, microsoft, adobe'
        ];

        return view('home', $data);
    }
}
