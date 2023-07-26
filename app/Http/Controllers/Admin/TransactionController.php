<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    public function index (){
        $items = Transaction::with([
            'details', 'tour_packages', 'user'
        ])->get();

        return view('pages.admin.transaction.index',[
            'items' => $items
        ]);
    }

    public function create()
    {
        //
    }

    public function store (TransactionRequest $request)
    {
        $data = $request->all();
        $data ['slug'] = Str::slug($request->title);

        $data['status'] = 'pending';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('payment', 'public');
            $data['proof'] = $imagePath;
        }

        Transaction::create($data);
        return redirect()->route('transaction.index');
    }

    public function show($id)
    {
        $item = Transaction::with([
            'details', 'tour_packages', 'user'
        ])->findOrFail($id);

        return view ('pages.admin.transaction.detail',[
        'item'=> $item
        ]);
    }

    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view ('pages.admin.transaction.edit',[
        'item'=> $item
        ]);
    }

    public function update (Request $request, $id)
    {
        $data = $request->all();
        $data ['slug'] = Str::slug($request->title);

        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index');
    }

    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);

        $item->delete();

        return redirect()->route('transaction.index');

    }
}
