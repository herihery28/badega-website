<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourPackage;

class DetailController extends Controller
{
    public function index (request $request, $slug)
    {
        $item = TourPackage::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();
        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
