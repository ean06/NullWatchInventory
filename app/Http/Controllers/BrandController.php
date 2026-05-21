<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
        ]);

        Brand::create([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect('/brands')->with('success', 'Brand berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show', compact('brand'));
    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect('/brands')->with('success', 'Brand berhasil diperbarui.');
    }

    public function delete(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect('/brands')->with('success', 'Brand berhasil dihapus.');
    }
}
