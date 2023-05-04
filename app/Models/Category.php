<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class Category extends Model
{
    use Sluggable;
    use SoftDeletes;

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
