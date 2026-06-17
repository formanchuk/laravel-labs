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
}