<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model_number',
        'name',
        'email',
        'otp',
        'country_code',
        'phone_number',
        'service_slug',
        'issue_description',
        'email_verified_at'
    ];
}

