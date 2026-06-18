<!DOCTYPE html>
<html>
<head>
    <title>Додати статтю</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, textarea, select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 20px; text-decoration: none; border-radius: 3px; border: none; cursor: pointer; }
        .btn-success { background: #28a745; color: white; }
        .btn-secondary { background: #6c757d; color: white; }
    </style>
</head>
<body>
    <h1>➕ Додати нову статтю</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Назва</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div class="form-group">
            <label for="category_id">Категорія</label>
            <select name="category_id" id="category_id" required>
                <option value="">Оберіть категорію</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="excerpt">Короткий опис</label>
            <textarea name="excerpt" id="excerpt" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="content">Текст статті</label>
            <textarea name="content" id="content" rows="10" required></textarea>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_published" checked> Опублікувати
            </label>
        </div>

        <button type="submit" class="btn btn-success">💾 Зберегти</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">↩ Назад</a>
    </form>
</body>
</html>