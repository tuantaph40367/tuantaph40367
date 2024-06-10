<?php

namespace Tdc\Buoi10\Controllers\Client;

use Tdc\Buoi10\Commons\Controller;

class HomeController extends Controller
{
    public function index()
    {

       $name = 'tuantaph40367';

       $this->renderViewClient('home', [
            'name' => $name
       ]);
    }   
}
