<?php

namespace App\Http\Controllers;

use App\Models\Restoration;
use Illuminate\Http\Request;

class RestorationController extends Controller
{
    public function index(){
        return Restoration::with('watchUnit')->get();
    }

    public function create(Request $request){
        $restoration = Restoration::create(
            $request->all()
        );

        return response()->json($restoration);
    }

    public function find(string $id){
        return Restoration::with('watchUnit')
            ->findOrFail($id);
    }

    public function show(string $id){
        return Restoration::with('watchUnit')
            ->findOrFail($id);
    }

    public function update(Request $request, string $id){
        $restoration = Restoration::findOrFail($id);

        $restoration->update($request->all());

        return response()->json($restoration);
    }

    public function destroy(string $id){
        $restoration = Restoration::findOrFail($id);

        $restoration->delete();

        return response()->json([
            'message' => 'Restoration deleted'
        ]);
    }
}
