<?php

namespace App\Observers;

use App\Models\Post;
use App\Jobs\SendPostNotification; // 🆕 ДОДАЙТЕ ЦЕЙ РЯДОК
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post): void
    {
        if (empty($post->slug)) {
            $post->slug = Str::slug($post->title);
        }
        
        if ($post->is_published && empty($post->published_at)) {
            $post->published_at = now();
        }
    }

    public function updating(Post $post): void
    {
        if ($post->isDirty('title') && empty($post->slug)) {
            $post->slug = Str::slug($post->title);
        }
        
        if ($post->isDirty('is_published') && $post->is_published && empty($post->published_at)) {
            $post->published_at = now();
        }
    }

    // 🆕 НОВИЙ МЕТОД: запускається після створення поста
    public function created(Post $post): void
    {
        if ($post->is_published) {
            SendPostNotification::dispatch($post);
        }
    }
}