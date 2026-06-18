<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            ['id' => 1, 'name' => 'Laravel', 'description' => 'All about Laravel'],
            ['id' => 2, 'name' => 'PHP', 'description' => 'PHP programming'],
            ['id' => 3, 'name' => 'JavaScript', 'description' => 'JavaScript and frontend'],
        ];

        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $categories = [
            1 => ['id' => 1, 'name' => 'Laravel', 'description' => 'All about Laravel'],
            2 => ['id' => 2, 'name' => 'PHP', 'description' => 'PHP programming'],
            3 => ['id' => 3, 'name' => 'JavaScript', 'description' => 'JavaScript and frontend'],
        ];

        $category = $categories[$id] ?? null;

        if (!$category) {
            abort(404);
        }

        return view('categories.show', compact('category'));
    }

    // ========== НОВИЙ МЕТОД ДЛЯ ЛАБОРАТОРНОЇ 5 ==========
    public function collectionExample()
    {
        // Отримуємо категорії з бази даних (якщо вони є)
        $categories = \App\Models\Category::all();
        
        // Якщо категорій немає в БД, використовуємо масив
        if ($categories->isEmpty()) {
            $categories = collect([
                ['id' => 1, 'name' => 'Laravel', 'description' => 'All about Laravel', 'is_active' => true],
                ['id' => 2, 'name' => 'PHP', 'description' => 'PHP programming', 'is_active' => true],
                ['id' => 3, 'name' => 'JavaScript', 'description' => 'JavaScript and frontend', 'is_active' => false],
                ['id' => 4, 'name' => 'Vue.js', 'description' => 'Vue.js framework', 'is_active' => true],
            ]);
        }
        
        // 1. filter - тільки активні категорії
        $activeCategories = $categories->filter(function ($category) {
            return $category['is_active'] ?? false;
        });
        
        // 2. map - перетворюємо дані (назви заглавними)
        $categoryNames = $categories->map(function ($category) {
            return [
                'id' => $category['id'],
                'name' => strtoupper($category['name']),
                'slug' => isset($category['slug']) ? $category['slug'] : strtolower($category['name']),
            ];
        });
        
        // 3. pluck - отримуємо тільки назви
        $names = $categories->pluck('name');
        
        // 4. groupBy - групуємо за активністю
        $grouped = $categories->groupBy(function ($category) {
            return ($category['is_active'] ?? false) ? 'active' : 'inactive';
        });
        
        return view('categories.collections', compact(
            'categories',
            'activeCategories', 
            'categoryNames', 
            'names', 
            'grouped'
        ));
    }
}