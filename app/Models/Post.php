<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use App\Models\Image;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
         
    protected $guarded = [];



    //pipeline 
    public static function allPosts()
    {                 
        $posts = app(Pipeline::class)
            ->send(Post::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\MaxCount::class,
            ])
            ->thenReturn()
            ->paginate(5);
            // ->get();
        return $posts;
    }


    //polymorphic relationship

    //one to one
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    //one to many
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //many to many
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
