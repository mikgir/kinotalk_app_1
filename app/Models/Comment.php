<?php

namespace App\Models;

use Carbon\Carbon;
use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableInterface;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Comment
 *
 * @property int                      $id
 * @property int|null                 $parent_id
 * @property int                      $user_id
 * @property int                      $article_id
 * @property string                   $body
 * @property string                   $status
 * @property bool                     $featured
 * @property Carbon|null              $created_at
 * @property Carbon|null              $updated_at
 *
 * @property Article                  $article
 * @property Comment|null             $comment
 * @property User                     $user
 * @property Collection|CommentLike[] $comment_likes
 * @property Collection|Comment[]     $comments
 *
 * @package App\Models
 */
class Comment extends Model implements ReactableInterface
{
    use Reactable;

    protected $table = 'comments';

    protected $casts = [
        'parent_id' => 'int',
        'user_id' => 'int',
        'article_id' => 'int',
        'featured' => 'bool'
    ];

    protected $fillable = [
        'parent_id',
        'user_id',
        'article_id',
        'body',
        'status',
        'featured'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comment_likes(): HasMany
    {
        return $this->hasMany(CommentLike::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
