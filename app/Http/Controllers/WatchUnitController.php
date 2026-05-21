<?php

namespace App\Http\Controllers;

use App\Models\WatchUnit;
use Illuminate\Http\Request;

class WatchUnitController extends Controller
{
    public function index(){
        return WatchUnit::with('watchModel')->get();
    }

    public function create(Request $request){
        $watchUnit = WatchUnit::create(
            $request->all()
        );

        return response()->json($watchUnit);
    }

    public function find($id){
        return WatchUnit::with('watchModel')
            ->findOrFail($id);
    }

    public function show(string $id){
        return WatchUnit::with('watchModel')
            ->findOrFail($id);
    }

    public function update(Request $request, string $id){
        $watchUnit = WatchUnit::findOrFail($id);

        $watchUnit->update($request->all());

        return response()->json($watchUnit);
    }

    public function delete(string $id){
        $watchUnit = WatchUnit::findOrFail($id);

        $watchUnit->delete();

        return response()->json([
            'message' => 'Watch Unit deleted'
        ]);
    }
}
