<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Source extends Model
{
    use HasFactory;

    protected $table = "sources";

    protected $fillable = [
        'id', 'name', 'url', 'status'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
