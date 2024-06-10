<?php

namespace Tdc\Buoi10\Controllers\Admin;

use Tdc\Buoi10\Commons\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $this->renderViewAdmin(__FUNCTION__);
    }
}