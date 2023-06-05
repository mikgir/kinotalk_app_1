<?php


namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Commentable;

    protected $table = 'news';

    protected $casts = [
        'featured' => 'bool'
    ];

    protected $fillable = [
        'source_id',
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

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }
}
