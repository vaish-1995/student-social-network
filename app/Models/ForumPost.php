<?php

// app/Models/ForumPost.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $fillable = [
        'user_id', 'title_en', 'title_fr', 'content_en', 'content_fr', 'language'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}