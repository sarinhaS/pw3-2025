<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $fillable = ['title', 'comment', 'category_id', 'user_id'];
    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
