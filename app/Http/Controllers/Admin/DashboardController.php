<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourPackage;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (Request $request)
    {   
        return view ('pages.admin.dashboard', [
            'tour_packages' => TourPackage::count(),
            'transactions' => Transaction::count(),
            'transactions_pending' => Transaction::where('transactions_status', 'PENDING')->count(),
            'transactions_success' => Transaction::where('transactions_status', 'SUCCESS')->count(),
        ]);
    }
}
