<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class GeneratePostThumbnail implements ShouldQueue
{
    use Queueable;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle(): void
    {
        // Імітація генерації мініатюри
        Log::info('🖼️ Генерація мініатюри для поста: ' . $this->post->title);
        Log::info('✅ Мініатюру згенеровано!');
    }
}