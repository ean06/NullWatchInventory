<?php

namespace App\Http\Controllers;

use App\Models\WatchModel;
use Illuminate\Http\Request;

class WatchModelController extends Controller
{
    public function index(){
        return WatchModel::with('brand')->get();
    }

    public function create(Request $request){
        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
                $request->image->extension();

            $request->image->move(
                public_path('images'),
                $imageName
            );

        } else {
            $imageName = null;
        }

        $watchModel = WatchModel::create([
            'brandId' => $request->brandId,
            'model_name' => $request->model_name,
            'year' => $request->year,
            'movement_type' => $request->movement_type,
            'desc' => $request->desc,
            'image' => $imageName,
            'reference_number' => $request->reference_number
        ]);

        return response()->json($watchModel);
    }

    public function find(string $id){
        return WatchModel::with('brand')
            ->findOrFail($id);
    }

    public function show(string $id){
        return WatchModel::with('brand')
            ->findOrFail($id);
    }

    public function update(Request $request, string $id){
        $watchModel = WatchModel::findOrFail($id);

        $watchModel->update($request->all());

        return response()->json($watchModel);
    }

    public function delete(string $id){
        $watchModel = WatchModel::findOrFail($id);

        $watchModel->delete();

        return response()->json([
            'message' => 'Watch Model deleted'
        ]);
    }
}
