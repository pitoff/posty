<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    // check if user already liked post
    public function likedBy(User $user)
    {
        //contains == laravel collection method and we are accessing likes as collection
        return $this->likes->contains('user_id', $user->id); 
        // at column user_id of likes collection check if id is linked to any like already.

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
