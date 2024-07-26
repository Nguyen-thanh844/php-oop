<?php

namespace Thanhnt84\Duan1\Controllers\Client;

use Thanhnt84\Duan1\Commons\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $name = 'you';

        $this->renderViewClient('home', [
            'name' => $name
        ]);
    }
}
