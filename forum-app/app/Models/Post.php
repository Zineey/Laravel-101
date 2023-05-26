<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    

    protected $fillable = [
        'post_subject',
        'post_desc',
        'user_id',
    ];

    public function user(){
        // return $this->belongsTo(User::class,'user_id', 'user_id');
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function replies(){
        return $this->hasMany(Reply::class, 'forum_id', 'id');
    }
}   
