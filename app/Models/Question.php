<?php

namespace App\Models;

use Database\Factories\QuestionFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    /** @use HasFactory<QuestionFactory> */
    use HasFactory;

    protected $appends = ['likes_count', 'dislikes_count'];

    /** @return HasMany<Vote, $this> */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * Attribute<int, never>: int = tipo retornado pelo getter, never = sem setter
     *
     * @return Attribute<int, never>
     */
    public function likesCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->votes()->where('vote', 'upvote')->count(),
        );
    }

    /** @return Attribute<int, never> */
    public function dislikesCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->votes()->where('vote', 'downvote')->count(),
        );
    }
}
