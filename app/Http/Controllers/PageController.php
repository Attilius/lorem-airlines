<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return View
     */
    public function index(string $page): View
    {
        if (view()->exists("admin.pages.{$page}")) {
            return view("admin.pages.{$page}");
        }

        return abort(404);
    }

    /**
     * @return View
     */
    public function vr(): View
    {
        return view("admin.pages.virtual-reality");
    }

    public function profile()
    {
        return view("pages.profile-static");
    }

}
