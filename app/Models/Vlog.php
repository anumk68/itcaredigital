<?php

// app/Models/Vlog.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'category_id', 'video_url', 'short_description',
        'description', 'meta_title', 'meta_img', 'meta_description', 'meta_keywords','blog_link',
        'brand_id'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
