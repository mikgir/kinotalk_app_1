<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SocialLink
 *
 * @property int $id
 * @property int $user_id
 * @property int $social_type_id
 * @property string $link
 * @property bool $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property SocialType $socialType
 * @property User $user
 *
 * @package App\Models
 */
class SocialLink extends Model
{
    use HasFactory;

    protected $table = 'social_links';

    protected $casts = [
        'user_id' => 'int',
        'social_type_id' => 'int',
        'active' => 'bool'
    ];

    protected $fillable = [
        'user_id',
        'social_type_id',
        'link',
        'active'
    ];

    /**
     * @return BelongsTo
     */
    public function socialType(): BelongsTo
    {
        return $this->belongsTo(SocialType::class);
    }

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
