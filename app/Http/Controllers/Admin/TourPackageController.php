<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TourPackageRequest;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TourPackageController extends Controller
{
    public function index (){
        $items = TourPackage::all();

        return view('pages.admin.tour-package.index',[
            'items' => $items
        ]);
    }

    public function create()
    {
        return view ('pages.admin.tour-package.create');
    }

    public function store (TourPackageRequest $request)
    {
        $data = $request->all();
        $data ['slug'] = Str::slug($request->title);

        TourPackage::create($data);
        return redirect()->route('tour-package.index');
    }

    public function edit($id)
    {
        $item = TourPackage::findOrFail($id);

        return view ('pages.admin.tour-package.edit',[
        'item'=> $item
        ]);
    }

    public function update (Request $request, $id)
    {
        $data = $request->all();
        $data ['slug'] = Str::slug($request->title);

        $item = TourPackage::findOrFail($id);

        $item->update($data);

        return redirect()->route('tour-package.index');
    }

    public function destroy($id)
    {
        $item = TourPackage::findOrFail($id);

        $item->delete();

        return redirect()->route('tour-package.index');

    }
}
