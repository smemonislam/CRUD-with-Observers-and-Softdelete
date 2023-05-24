<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        $slug = Str::slug($post->title);
        $count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $post->slug = $count ? "{$slug}-{$count}" : $slug;
        $post->save();
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
       
    }

     /**
     * Handle the Post "updating" event.
     */
    public function updating(Post $post): void
    {
        $slug = Str::slug($post->title);
        $count = Post::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $post->slug = $count ? "{$slug}-{$count}" : $slug;
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
