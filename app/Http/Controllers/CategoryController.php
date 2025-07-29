<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.addcategory');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($validated);

        return redirect()->route('pages.category')->with('success', 'Category added successfully!');
    }

    public function show(Category $category)
    {
        return view('pages.category', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('pages.editcategory', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
        ]);

        $category->update($validated);

        return redirect()->route('pages.category')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('pages.category')->with('success', 'Category deleted successfully!');
    }
}
