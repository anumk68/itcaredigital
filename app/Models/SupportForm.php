<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SupportForm extends Model
{
    use HasFactory, Notifiable;

    // Specify the table name
    protected $table = 'servicesupports';

    protected $fillable = [
        'type',
        'model_number',
        'full_name',
        'phone_number',
    ];
}
