<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'title', 'image', 'tags', 'description'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_name', 'id');
    }
}
