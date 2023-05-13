<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Category
 *
 * @property int                  $id
 * @property int                  $order
 * @property string               $name
 * @property string               $slug
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property string|null          $deleted_at
 *
 * @property Collection|Article[] $articles
 *
 * @package App\Models
 */
class Category extends Model implements HasMedia
{
    use Sluggable;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $table = 'categories';

    protected $casts = [
        'order' => 'int'
    ];

    protected $fillable = [
        'order',
        'name',
        'slug'
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }


    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(120)
            ->height(120);
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 200, 200)
            ->nonQueued();
    }
    /**
     * @return \string[][]
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
