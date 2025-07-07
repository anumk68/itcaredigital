<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Code extends Model
{
    use HasFactory, Notifiable;

    protected $table   = "phone_code";
    protected $guarded = [] ;
}
