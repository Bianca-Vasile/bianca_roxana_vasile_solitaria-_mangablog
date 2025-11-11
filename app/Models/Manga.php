<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'number',
        'year',
        'category_id',
        'image_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
