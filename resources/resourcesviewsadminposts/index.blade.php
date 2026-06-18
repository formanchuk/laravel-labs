<!DOCTYPE html>
<html>
<head>
    <title>Керування статтями</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f5f5f5; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .btn-success { background: #28a745; color: white; }
        .btn-primary { background: #007bff; color: white; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-warning { background: #ffc107; color: black; }
        .alert { padding: 10px; background: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>📝 Керування статтями</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">+ Додати статтю</a>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Категорія</th>
                <th>Автор</th>
                <th>Опубліковано</th>
                <th>Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name ?? 'Без категорії' }}</td>
                    <td>{{ $post->user->name ?? 'Невідомий' }}</td>
                    <td>{{ $post->is_published ? '✅ Так' : '❌ Ні' }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Перегляд</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Редагувати</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Ви впевнені?')">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>