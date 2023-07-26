<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::all();

      
        return view('pages.payment', compact('transactions'));
    }

}
