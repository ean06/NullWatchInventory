<?php

namespace App\Http\Controllers;

use App\Models\WatchUnit;
use App\Models\WatchModel;
use Illuminate\Http\Request;

class WatchUnitController extends Controller
{
    public function index()
    {
        $watchUnits = WatchUnit::with('watchModel.brand')->get();
        return view('watch_units.Index', compact('watchUnits'));
    }

    public function create()
    {
        $watchModels = WatchModel::with('brand')->get();
        return view('watch_units.Create', compact('watchModels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelId'        => 'required|exists:watch_model,modelId',
            'sku'            => 'nullable|string|max:255',
            'condition'      => 'nullable|in:minus,excellent,good,fair,poor',
            'status'         => 'nullable|in:availabel,reserved,sold,inServices',
            'purchase_price' => 'nullable|integer|min:0',
            'asking_price'   => 'nullable|integer|min:0',
            'sold_price'     => 'nullable|integer|min:0',
            'purchase_date'  => 'nullable|date',
            'sold_date'      => 'nullable|date',
            'note'           => 'nullable|string|max:255',
            'held'           => 'nullable|string|max:255',
        ]);

        WatchUnit::create($request->only([
            'modelId', 'sku', 'condition', 'status',
            'purchase_price', 'asking_price', 'sold_price',
            'purchase_date', 'sold_date', 'note', 'held',
        ]));

        return redirect('/watch-units')->with('success', 'Watch unit berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $watchUnit = WatchUnit::with('watchModel.brand')->findOrFail($id);
        return view('watch_units.Show', compact('watchUnit'));
    }

    public function edit(string $id)
    {
        $watchUnit = WatchUnit::findOrFail($id);
        $watchModels = WatchModel::with('brand')->get();
        return view('watch_units.Edit', compact('watchUnit', 'watchModels'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'modelId'        => 'required|exists:watch_model,modelId',
            'sku'            => 'nullable|string|max:255',
            'condition'      => 'nullable|in:minus,excellent,good,fair,poor',
            'status'         => 'nullable|in:availabel,reserved,sold,inServices',
            'purchase_price' => 'nullable|integer|min:0',
            'asking_price'   => 'nullable|integer|min:0',
            'sold_price'     => 'nullable|integer|min:0',
            'purchase_date'  => 'nullable|date',
            'sold_date'      => 'nullable|date',
            'note'           => 'nullable|string|max:255',
            'held'           => 'nullable|string|max:255',
        ]);

        $watchUnit = WatchUnit::findOrFail($id);
        $watchUnit->update($request->only([
            'modelId', 'sku', 'condition', 'status',
            'purchase_price', 'asking_price', 'sold_price',
            'purchase_date', 'sold_date', 'note', 'held',
        ]));

        return redirect('/watch-units')->with('success', 'Watch unit berhasil diperbarui.');
    }

    public function delete(string $id)
    {
        $watchUnit = WatchUnit::findOrFail($id);
        $watchUnit->delete();

        return redirect('/watch-units')->with('success', 'Watch unit berhasil dihapus.');
    }
}
