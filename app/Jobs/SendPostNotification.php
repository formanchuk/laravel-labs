<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendPostNotification implements ShouldQueue
{
    use Queueable;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function handle(): void
    {
        // Імітація відправки email або сповіщення
        Log::info('📧 Новий пост опубліковано: ' . $this->post->title);
        Log::info('📝 Автор: ' . ($this->post->user->name ?? 'Невідомий'));
        Log::info('📂 Категорія: ' . ($this->post->category->name ?? 'Без категорії'));
        Log::info('🔗 Посилання: ' . url('/posts/' . $this->post->id));
    }
}