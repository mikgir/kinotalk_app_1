<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class SocialType
 *
 * @property int $id
 * @property int $order
 * @property string $name
 * @property string $icon_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|SocialLink[] $socialLinks
 *
 * @package App\Models
 */
class SocialType extends Model
{
    use HasFactory;

    protected $table = 'social_types';

    protected $casts = [
        'order' => 'int'
    ];

    protected $fillable = [
        'order',
        'name',
        'icon_name',
    ];

    public function socialLinks(): HasMany
    {
        return $this->hasMany(SocialLink::class);

    }
}
