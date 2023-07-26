<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'tour_packages_id', 'image',
    ];

    protected $hidden =[

    ];

    /**
     * Summary of tour_package
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tour_packages()
    {
        return $this->belongsTo(TourPackage::class, 'tour_packages_id', 'id');
    }
}
