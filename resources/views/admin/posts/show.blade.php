<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .card { border: 1px solid #ddd; padding: 20px; border-radius: 5px; background: #f9f9f9; }
        .btn { padding: 10px 20px; text-decoration: none; border-radius: 3px; }
        .btn-warning { background: #ffc107; color: black; }
        .btn-secondary { background: #6c757d; color: white; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <h1>📄 Деталі статті</h1>

    <div class="card">
        <p><span class="label">ID:</span> {{ $post->id }}</p>
        <p><span class="label">Назва:</span> {{ $post->title }}</p>
        <p><span class="label">Slug:</span> {{ $post->slug }}</p>
        <p><span class="label">Категорія:</span> {{ $post->category->name ?? 'Без категорії' }}</p>
        <p><span class="label">Автор:</span> {{ $post->user->name ?? 'Невідомий' }}</p>
        <p><span class="label">Короткий опис:</span> {{ $post->excerpt ?: 'Немає' }}</p>
        <p><span class="label">Текст:</span> {{ $post->content }}</p>
        <p><span class="label">Опубліковано:</span> {{ $post->is_published ? '✅ Так' : '❌ Ні' }}</p>
        <p><span class="label">Дата публікації:</span> {{ $post->published_at ? $post->published_at->format('d.m.Y H:i') : 'Не опубліковано' }}</p>
        <p><span class="label">Створено:</span> {{ $post->created_at }}</p>
        <p><span class="label">Оновлено:</span> {{ $post->updated_at }}</p>
    </div>

    <br>

    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">✏️ Редагувати</a>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">↩ Назад до списку</a>
</body>
</html>