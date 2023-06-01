<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'content' => 'admin/v_dashboard',
        );
        return view('layout/v_wrapper', $data);
    }
}
