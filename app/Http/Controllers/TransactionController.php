<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction/transaction', [
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $accounts = Account::all();
        return view('transaction/create_transaction', [
            'accounts' => $accounts
        ]);
    }


    public function validateRequest(Request $request)
    {
        $request->validate([
            'account_id' => ['required', 'integer', 'exists:accounts,id'],
            'type' => ['required', 'in:debit,credit'],
            'nominal' => ['required', 'numeric'],
            'description' => ['required', 'string'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        Transaction::create([
            'account_id' => $request['account_id'],
            'user_id' => $request->user()->id,
            'type' => $request['type'],
            'nominal' => $request['nominal'],
            'description' => $request['description'],
        ]);

        return redirect()->route('transaction');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $accounts = Account::all();
        return view('transaction/edit_transaction', [
            'transaction' => $transaction,
            'accounts' => $accounts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $transaction = Transaction::findOrFail($id);
        $transaction->account_id = $request['account_id'];
        $transaction->type = $request['type'];
        $transaction->nominal = $request['nominal'];
        $transaction->description = $request['description'];
        $transaction->save();

        return redirect()->route('transaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction');
    }
}
