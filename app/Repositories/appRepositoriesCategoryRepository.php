<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAll()
    {
        return Category::all();
    }
    
    public function getActive()
    {
        return Category::where('is_active', true)->get();
    }
    
    public function findById($id)
    {
        return Category::findOrFail($id);
    }
    
    public function create(array $data)
    {
        return Category::create($data);
    }
    
    public function update($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }
    
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
} 