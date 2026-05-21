<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index(){
        return Transaction::with('watchUnit')->get();
    }

    public function create(Request $request)
    {
        $transaction = Transaction::create(
            $request->all()
        );

        return response()->json($transaction);
    }

    public function find(string $id){
        return Transaction::with('watchUnit')
            ->findOrFail($id);
    }

    public function show(string $id){
        return Transaction::with('watchUnit')
            ->findOrFail($id);
    }

    public function update(Request $request, string $id){
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());

        return response()->json($transaction);
    }

    public function destroy(string $id){
        $transaction = Transaction::findOrFail($id);

        $transaction->delete();

        return response()->json([
            'message' => 'Transaction deleted'
        ]);
    }
}
