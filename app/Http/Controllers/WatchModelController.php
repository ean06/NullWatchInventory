<?php

namespace App\Http\Controllers;

use App\Models\WatchModel;
use App\Models\Brand;
use Illuminate\Http\Request;

class WatchModelController extends Controller
{
    public function index()
    {
        $watchModels = WatchModel::with('brand')->get();
        return view('watch_models.Index', compact('watchModels'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('watch_models.Create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brandId'          => 'required|exists:brands,brandId',
            'model_name'       => 'required|string|max:50',
            'year'             => 'nullable|digits:4|integer|min:1800|max:' . date('Y'),
            'movement_type'    => 'nullable|in:manual,automatic,quartz',
            'desc'             => 'nullable|string|max:150',
            'image'            => 'nullable|string|max:255',
            'reference_number' => 'nullable|string|max:50',
        ]);

        WatchModel::create($request->only([
            'brandId', 'model_name', 'year', 'movement_type', 'desc', 'image', 'reference_number',
        ]));

        return redirect('/watch-models')->with('success', 'Watch model berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $watchModel = WatchModel::with('brand')->findOrFail($id);
        return view('watch_models.Show', compact('watchModel'));
    }

    public function edit(string $id)
    {
        $watchModel = WatchModel::findOrFail($id);
        $brands = Brand::all();
        return view('watch_models.Edit', compact('watchModel', 'brands'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'brandId'          => 'required|exists:brands,brandId',
            'model_name'       => 'required|string|max:50',
            'year'             => 'nullable|digits:4|integer|min:1800|max:' . date('Y'),
            'movement_type'    => 'nullable|in:manual,automatic,quartz',
            'desc'             => 'nullable|string|max:150',
            'image'            => 'nullable|string|max:255',
            'reference_number' => 'nullable|string|max:50',
        ]);

        $watchModel = WatchModel::findOrFail($id);
        $watchModel->update($request->only([
            'brandId', 'model_name', 'year', 'movement_type', 'desc', 'image', 'reference_number',
        ]));

        return redirect('/watch-models')->with('success', 'Watch model berhasil diperbarui.');
    }

    public function delete(string $id)
    {
        $watchModel = WatchModel::findOrFail($id);
        $watchModel->delete();

        return redirect('/watch-models')->with('success', 'Watch model berhasil dihapus.');
    }
}
