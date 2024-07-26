<?php

namespace Thanhnt84\Duan1\Controllers\Admin;

use Thanhnt84\Duan1\Commons\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $this->renderViewAdmin(__FUNCTION__);
    }
}
