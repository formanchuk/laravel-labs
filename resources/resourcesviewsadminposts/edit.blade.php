<!DOCTYPE html>
<html>
<head>
    <title>Редагувати статтю</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, textarea, select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 20px; text-decoration: none; border-radius: 3px; border: none; cursor: pointer; }
        .btn-primary { background: #007bff; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
    </style>
</head>
<body>
    <h1>✏️ Редагувати статтю: {{ $post->title }}</h1>

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Назва</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Категорія</label>
            <select name="category_id" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="excerpt">Короткий опис</label>
            <textarea name="excerpt" id="excerpt" rows="3">{{ $post->excerpt }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Текст статті</label>
            <textarea name="content" id="content" rows="10" required>{{ $post->content }}</textarea>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_published" {{ $post->is_published ? 'checked' : '' }}> Опубліковано
            </label>
        </div>

        <button type="submit" class="btn btn-primary">💾 Оновити</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">↩ Назад</a>
    </form>
</body>
</html>