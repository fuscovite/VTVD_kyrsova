<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Service;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('site.home', [
            'servicesCount' => Service::count(),
            'partsCount' => Part::count(),
        ]);
    }

    public function services(): View
    {
        return view('site.services', ['services' => Service::orderBy('title')->get()]);
    }

    public function parts(): View
    {
        return view('site.parts', ['parts' => Part::orderBy('name')->get()]);
    }
}
