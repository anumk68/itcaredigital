<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'package_id',
        'address',
        'country',
        'state',
        'city',
        'zip',
        'notes',
        'amount',
        'status'
    ];
    // In Order.php
public function user()
{
    return $this->belongsTo(User::class);
}

public function package()
{
    return $this->belongsTo(Package::class);
}

}
