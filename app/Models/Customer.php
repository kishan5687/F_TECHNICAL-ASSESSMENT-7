<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // This property safely permits mass-assignment via your forms
    protected $fillable = ['full_name', 'email'];
}
