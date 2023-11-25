<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    final public function index()
    {
        $cms_content = [
            'module_name'     => 'Admin', // page title
            'module_route'    => route('admin'),
            'sub_module_name' => 'Overview',
//            'button_type'     => 'create', //create
//            'button_route'    => 'dashboard'
        ];

        return view('dashboard.index', compact('cms_content'));
    }
}
