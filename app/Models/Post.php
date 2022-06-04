<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\useUuid;

class Post extends Model
{
    use HasFactory, useUuid;
    
    protected $fillable = ['title','description', 'is_published', 'user_id'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
