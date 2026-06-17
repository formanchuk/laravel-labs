<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'Getting Started with Laravel', 'excerpt' => 'Learn Laravel basics'],
            ['id' => 2, 'title' => 'PHP 8.1 Features', 'excerpt' => 'Explore new PHP features'],
            ['id' => 3, 'title' => 'JavaScript ES2024', 'excerpt' => 'New JavaScript features'],
        ];

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $posts = [
            1 => ['id' => 1, 'title' => 'Getting Started with Laravel', 'content' => 'Laravel is a powerful PHP framework...'],
            2 => ['id' => 2, 'title' => 'PHP 8.1 Features', 'content' => 'PHP 8.1 introduces enums, fibers...'],
            3 => ['id' => 3, 'title' => 'JavaScript ES2024', 'content' => 'New features in JavaScript...'],
        ];

        $post = $posts[$id] ?? null;

        if (!$post) {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }
}