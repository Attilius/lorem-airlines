<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Application|View|Factory
     */
    public function index(): Application|View|Factory
    {
        return view('admin.pages.dashboard');
    }
}
