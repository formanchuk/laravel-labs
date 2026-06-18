<!DOCTYPE html>
<html>
<head>
    <title>Колекції</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .block { border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 5px; }
        .block h3 { margin-top: 0; }
        pre { background: #f5f5f5; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>📊 Робота з колекціями</h1>
    
    <div class="block">
        <h3>1. filter (тільки активні категорії)</h3>
        <pre>{{ $activeCategories->pluck('name')->implode(', ') ?: 'немає активних' }}</pre>
    </div>
    
    <div class="block">
        <h3>2. map (назви заглавними літерами)</h3>
        <pre>{{ $categoryNames->pluck('name')->implode(', ') }}</pre>
    </div>
    
    <div class="block">
        <h3>3. pluck (тільки назви)</h3>
        <pre>{{ $names->implode(', ') }}</pre>
    </div>
    
    <div class="block">
        <h3>4. groupBy (за активністю)</h3>
        <pre>Активні: {{ isset($grouped['active']) ? $grouped['active']->pluck('name')->implode(', ') : 'немає' }}
Неактивні: {{ isset($grouped['inactive']) ? $grouped['inactive']->pluck('name')->implode(', ') : 'немає' }}</pre>
    </div>

    <div class="block">
        <h3>📋 Всі категорії:</h3>
        <pre>{{ $categories->pluck('name')->implode(', ') }}</pre>
    </div>
</body>
</html>