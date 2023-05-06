<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $casts = [
        'category_id' => 'int',
        'featured' => 'bool'
    ];

    protected $fillable = [
        'category_id',
        'source',
        'title',
        'seo_title',
        'excerpt',
        'body',
        'image',
        'slug',
        'meta_description',
        'meta_keywords',
        'status',
        'featured'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
