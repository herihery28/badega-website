<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourPackage;

class HomeController extends Controller
{
    public function index (request $request)
    {
        $items = TourPackage::with(['galleries'])->get();
        return view('pages.home',[
            'items' => $items
        ]);
    }
}
