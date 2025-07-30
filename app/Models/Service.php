<?php

// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    use HasFactory;

    protected $fillable = [
        'service_name',
        'brand_id',
        'slug',
        'icon',
        'banner_image',
        'description',
        'status',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }


}

