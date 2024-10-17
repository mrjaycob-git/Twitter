<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $fillable = ['content', 'likes'];

    public function setContent($content)
    {
        $this->attributes['content'] = $content;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
