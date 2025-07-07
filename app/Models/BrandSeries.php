<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSeries extends Model {
    use HasFactory;

    protected $fillable = ['brand_id', 'series_name', 'slug', 'status'];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}

