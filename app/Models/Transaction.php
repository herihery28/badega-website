<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'tour_packages_id', 'users_id', 'transactions_total', 'transactions_status'
    ];

    protected $hidden =[

    ];
    
    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function tour_packages()
    {
        return $this->belongsTo(TourPackage::class, 'tour_packages_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
