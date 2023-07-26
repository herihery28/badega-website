<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transactions_id', 'username','date'
    ];

    protected $hidden =[

    ];
    /**
     * Summary of tour_package
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }

   
}
