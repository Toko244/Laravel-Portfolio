<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'short_description',
        'address',
        'country',
        'email',
        'facebook',
        'twitter',
        'instagram',
        'linkedin'
    ];
}
