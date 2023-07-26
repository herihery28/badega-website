<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Gallery;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GalleryController extends Controller
{
    public function index (){
        $items = Gallery::with(['tour_packages'])->get();

        return view('pages.admin.gallery.index',[
            'items' => $items
        ]);
    }

    public function create()
    {
        $tour_packages = TourPackage::all();
        return view ('pages.admin.gallery.create', [
            'tour_packages' => $tour_packages
        ]);
    }

    public function store (GalleryRequest $request)
    {
        $data = $request->all();

        $data['image']= $request->file('image')->store(
            'assets/gallery', 'public'
        );

        Gallery::create($data);
        return redirect()->route('gallery.index');
    }

    public function edit($id)
    {
        $item = Gallery::findOrFail($id);
        $tour_packages = TourPackage::all();

        return view ('pages.admin.gallery.edit',[
        'item'=> $item,
        'tour_packages' => $tour_packages

        ]);
    }

    public function update (Request $request, $id)
    {
        $data = $request->all();
        $data['image']= $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = Gallery::findOrFail($id);

        $item->update($data);

        return redirect()->route('gallery.index');
    }

    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);

        $item->delete();

        return redirect()->route('gallery.index');

    }
}
