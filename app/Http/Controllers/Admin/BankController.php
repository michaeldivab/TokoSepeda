<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BankController extends Controller
{
    public function showAll(): View
    {
        $viewData['banks'] = Bank::all();
        $viewData['title'] = 'Bank';

        return view('admin.bank.showAll')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {

    }

    public function update(string $id): View
    {
        
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {
        $bank = Bank::where('id', $id)->first();

        $bank->bank_username   = $request->bank_username;
        $bank->bank_name       = $request->bank_name;
        $bank->bank_no         = $request->bank_no;
        $bank->save();

        flash('Seccess! Edit Bank has Sucessfully.')->success();
        return redirect()->back();
    }

    public function create(): View
    {

    }

    public function save(Request $request): RedirectResponse
    {
        $bank = new Bank();

        $bank->bank_username   = $request->bank_username;
        $bank->bank_name       = $request->bank_name;
        $bank->bank_no         = $request->bank_no;
        $bank->save();

        flash('Seccess! Bank has Added Sucessfully.')->success();
        return redirect()->back();
    }

    public function remove(string $id): RedirectResponse
    {   
        Bank::where('id', $id)->delete();            

        flash('Seccess! Bank has Deleted Sucessfully.')->warning();
        return redirect()->back();
    }
}
