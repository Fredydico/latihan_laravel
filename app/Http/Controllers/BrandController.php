<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() 
    {
        $brands = Brand::all();
        return response()->json(['brands' => $brands]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $brand = Brand::create($validatedData);
        return response()->json(['message' => 'Brand berhasil disimpan', 'brand' => $brand]);
    }

    public function update(Request $request, string $id) {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $brand = Brand::findOrFail($id);
        $brand->update($validatedData);
        return response()->json(['message' => 'Brand berhasil diupdate', 'brand' => $brand]);
    }

    public function destroy(string $id) {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return response()->json(['message' => 'Brand berhasil dihapus']);
    }

}
