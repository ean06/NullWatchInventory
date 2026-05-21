<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return response()->json(
            Brand::all()
        );
    }

    public function create(Request $request){
        $brand = Brand::create([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return response()->json($brand);
    }

    public function find(string $id){
        return response()->json(
            Brand::findOrFail($id)
        );
    }

    public function show(string $id){
        return response()->json(
            Brand::findOrFail($id)
        );
    }

    public function update(Request $request, string $id){
        $brand = Brand::findOrFail($id);

        $brand->update([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        return response()->json($brand);
    }

    public function delete(string $id){
        $brand = Brand::findOrFail($id);

        $brand->delete();

        return response()->json([
            'message' => 'Brand deleted'
        ]);
    }
}
