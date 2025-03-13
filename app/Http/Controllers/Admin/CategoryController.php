<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
    
    public function create() {
        return view('admin.categories.create');
    }
    
    public function store(Request $request) {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create(['name' => $request->name]);
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
    }
    
    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    
    public function update(Request $request, $id) {
        $request->validate(['name' => 'required|string|max:255']);
        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }
    
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
    
}
