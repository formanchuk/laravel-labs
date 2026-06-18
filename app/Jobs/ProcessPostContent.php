<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessPostContent implements ShouldQueue
{
    use Queueable;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle(): void
    {
        // Імітація обробки контенту
        Log::info('🔄 Обробка контенту поста: ' . $this->post->title);
        Log::info('📝 Довжина контенту: ' . strlen($this->post->content) . ' символів');
        Log::info('✅ Контент оброблено!');
    }
}