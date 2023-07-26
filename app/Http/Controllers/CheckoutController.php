<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TourPackage;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with([ 'details', 'tour_packages', 'user'])->findOrFail($id);

        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $tour_package = TourPackage::findOrFail($id);

        $transaction = Transaction::create([
            'tour_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'transactions_total' => $tour_package->price,
            'transactions_status' => 'IN_CART',
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'date' => Carbon::now()
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $id)
    {
    $request->validate([
        'username' => 'required|string|exists:users,username',
        'date' => 'required'
    ]);

    $data = $request->all();
    $data['transactions_id'] = $id;

    TransactionDetail::create($data);

    $transaction = Transaction::with(['tour_packages'])->find($id);

    $transaction->transactions_total += 
            $transaction->tour_packages->price;
    
            $transaction->save();

    return redirect()->route('checkout', $id);
    }


    public function remove(Request $request, $detail_id)
{
    $item = TransactionDetail::findOrFail($detail_id);

    $transaction = Transaction::with(['details', 'tour_packages'])
        ->findOrFail($item->transactions_id);

    $transaction->transactions_total -= 
        $transaction->tour_packages->price;

    $transaction->save();
    $item->delete(); 

    return redirect()->route('checkout', $item->transactions_id);
}


    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details', 'tour_packages.galleries', 'user'])
            ->findOrFail($id);
        $transaction->transactions_status = 'PENDING';

        $transaction->save();

        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
        );

        return view('pages.success');
    }
}
