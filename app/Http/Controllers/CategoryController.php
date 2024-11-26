<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $category = Category::create($validatedData);
        return response()->json(['message' => 'Kategori berhasil disimpan', 'category' => $category]);
    }

    public function update(Request $request, string $id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->update($validatedData);
        return response()->json(['message' => 'Kategori berhasil diupdate', 'category' => $category]);
    }

    public function destroy(string $id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
