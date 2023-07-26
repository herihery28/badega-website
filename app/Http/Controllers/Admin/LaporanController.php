<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index (Request $request)
    {
        $transactions = Transaction::all();

        return view('pages.admin.laporan.index', compact('transactions'));
    }
}
