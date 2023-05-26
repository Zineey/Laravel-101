<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reply extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    // protected $post_id = 'forum_id';
    protected $fillable =   [
        'reply_desc',
        'user_id',
        'forum_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
