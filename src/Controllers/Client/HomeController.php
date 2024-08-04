<?php

namespace Thanhnt84\Duan1\Controllers\Client;

use Thanhnt84\Duan1\Commons\Controller;
use Thanhnt84\Duan1\Commons\Helper;
use Thanhnt84\Duan1\Models\Product;
class HomeController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $name = 'Thanhnt84';
        $products = $this->product->all();
        $this->renderViewClient('home', [
            'name' => $name,
            'products' => $products
        ]);
    }
}
