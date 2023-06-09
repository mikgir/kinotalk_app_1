<?php

namespace App\Models;

use App\Enum\ArticleStatusEnum;
use App\Traits\Commentable;
use Carbon\Carbon;
use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableInterface;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

/**
 * Class ArticlePage
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string|null $seo_title
 * @property string|null $excerpt
 * @property string $body
 * @property string|null $image
 * @property string $slug
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string $status
 * @property bool $featured
 * @property bool $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Category $category
 * @property User $user
 *
 * @package App\Models
 */
class Article extends Model implements ReactableInterface, HasMedia
{
    use Taggable;
    use Sluggable;
    use SoftDeletes;
    use Reactable;
    use InteractsWithMedia;
    use Commentable;

    protected $table = 'articles';

    protected $casts = [
        'user_id' => 'int',
        'category_id' => 'int',
        'featured' => 'bool',
        'active' => 'bool',
        'status' => ArticleStatusEnum::class
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'seo_title',
        'excerpt',
        'body',
        'image',
        'slug',
        'meta_description',
        'meta_keywords',
        'status',
        'featured',
        'active'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('sm_image')
            ->width(820)
            ->height(440);
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public static function last()
    {
        return static::all()->last();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
