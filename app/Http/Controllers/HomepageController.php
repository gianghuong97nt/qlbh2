<?php
namespace App\Http\Controllers;

use App\Http\Services\HomepageService;

class HomepageController extends Controller
{
    protected $homepageService;

    public function __construct(HomepageService $homepageService)
    {
        $this->homepageService = $homepageService;
    }

    public function index() {
        $categories = $this->homepageService->getCategory();
        $id = $categories[0]->id ;
        $products = $this->homepageService->getProduct($id);
        
        return view('customer.homepages.index', compact('products', 'categories','id'));
    }

    public function load($id) {
        $products = $this->homepageService->getProduct($id);
        
        return view('customer.homepages.result', compact('products'));
    }
}
