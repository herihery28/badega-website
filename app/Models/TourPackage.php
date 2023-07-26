<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $fillable =[
        'title', 'slug', 'location', 'about', 'featured_ticket', 'parking', 'documentation',
        'guide_tours', 'safety', 'foods', 'duration', 'type', 'price'
    ];

    protected $hidden=[
        
    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'tour_packages_id', 'id');
    }
}
