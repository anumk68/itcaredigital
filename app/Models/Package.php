<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'package_name',
        'slug',
        'price',
        'short_description',
        'description',
        'amenities',
        'reviews',
        'subscriptions',
        'status',
        'package_type',
    ];

    protected $casts = [
        'subscriptions' => 'array',
        'status' => 'boolean',
    ];

    public function reviews()
{
    return $this->hasMany(Review::class);
}
    public function review()
{
    return $this->hasMany(Review::class, 'package_id');
}
    public function orders()
{
    return $this->hasMany(Order::class, 'package_id');
}

}

