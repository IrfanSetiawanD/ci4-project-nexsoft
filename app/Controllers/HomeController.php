<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\FaqModel;
use App\Models\PrincipalModel;
use App\Models\ProductModel;
use App\Models\ServiceModel;
use App\Models\SettingModel;
use App\Models\TestimonialModel;

class HomeController extends BaseController
{
    protected $settingModel;
    protected $principalModel;
    protected $serviceModel;
    protected $productModel;
    protected $testimonialModel;
    protected $faqModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->settingModel     = new SettingModel();
        $this->principalModel   = new PrincipalModel();
        $this->serviceModel     = new ServiceModel();
        $this->productModel     = new ProductModel();
        $this->testimonialModel = new TestimonialModel();
        $this->faqModel         = new FaqModel();
        $this->categoryModel    = new CategoryModel();
    }

    /**
     * Homepage
     */
    public function index()
    {
        $setting = $this->settingModel->first();

        $data = [
            'title'            => $setting['meta_title'] ?? 'NexSoft Commerce | Digital Software Solution',
            'meta_description' => $setting['meta_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',

            'setting' => $setting,

            'principals' => $this->principalModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->limit(20)
                ->findAll(),

            'services' => $this->serviceModel
                ->where('status', 'active')
                ->orderBy('display_order', 'ASC')
                ->findAll(),

            'categories' => $this->categoryModel
                ->where('status', 'active')
                ->orderBy('name', 'ASC')
                ->findAll(),

            'featuredProducts' => $this->productModel
                ->where('status', 'active')
                ->where('is_featured', 1)
                ->orderBy('id', 'DESC')
                ->limit(8)
                ->findAll(),

            'testimonials' => $this->testimonialModel
                ->where('status', 'active')
                ->orderBy('id', 'DESC')
                ->limit(6)
                ->findAll(),

            'faqs' => $this->faqModel
                ->where('status', 'active')
                ->orderBy('display_order', 'ASC')
                ->limit(5)
                ->findAll(),
        ];

        return view('pages/home', $data);
    }

    /**
     * About Page
     */
    public function about()
    {
        $setting = $this->settingModel->first();

        return view('pages/about', [
            'title'            => 'About Us',
            'meta_description' => $setting['meta_description'] ?? '',
            'meta_keywords'    => $setting['meta_keywords'] ?? '',
            'setting'          => $setting,
        ]);
    }

    /**
     * Search
     */
    public function search()
    {
        return redirect()->to('/');
    }
}
