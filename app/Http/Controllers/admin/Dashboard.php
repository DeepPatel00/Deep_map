<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category_model;
use App\Models\Articles_model;
use App\Models\User;

// use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function dashboard()
    {
        $page_title = 'Dashboard';
        $users = 0;
        return view("admin.dashboard", compact('page_title', 'users'));
    }
}
