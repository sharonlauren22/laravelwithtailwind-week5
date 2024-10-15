<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'article'];

    /**
     * Get the comments for this article
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function number_of_comments() {
        return $this->hasMany(Comment::class)->count();
    }
}
