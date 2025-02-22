<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * Display customers page
     *
     * @return \Illuminate\View\View
     */
    public function customers()
    {
        return view('pages.customers');
    }
}
