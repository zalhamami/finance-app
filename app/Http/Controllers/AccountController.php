<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $accounts = Account::all();
        return view('account/account', [
            'accounts' => $accounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('account/create_account');
    }

    public function validateRequest(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        Account::create([
            'name' => $request['name'],
            'notes' => $request['notes'],
        ]);
        return redirect()->route('account');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('account/edit_account', [
            'account' => $account
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $account = Account::findOrFail($id);
        $account->name = $request['name'];
        $account->notes = $request['notes'];
        $account->save();

        return redirect()->route('account');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('account');
    }
}
