<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function advertisement(): View
    {
        return view('pages.advertisement');
    }
}
