<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function showAll(): View
    {
        $viewData['users'] = User::where('role', 'admin')->get();
        $viewData['title'] = 'All User';

        return view('admin.user.showAll')->with('viewData', $viewData);
    }

    public function showCustomers(): View
    {
        $viewData['users'] = User::where('role', 'user')->get();
        $viewData['title'] = 'Customers';

        return view('admin.user.showCustomers')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {

    }

    public function update(string $id): View
    {
        
    }

    public function saveUpdate(Request $request, string $id): RedirectResponse
    {   
        try {
            $user = User::where('id', $id)->first();

            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->password     = isset($request->password) ? Hash::make($request->password) : $user->password;
            $user->role         = 'admin';
            $user->save();
        } catch(\Exception $e) {
            flash('Fail! User Fail to Edit.')->error();
            return redirect()->back();
        }

        flash('Success! User has Edited Sucessfully.')->warning();
        return redirect()->back();
    }

    public function create(): View
    {

    }

    public function save(Request $request): RedirectResponse
    {   
        try {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => 'admin',
                'address' => null,
                'balance' => null,
            ]);
        } catch(\Exception $e) {
            flash('Fail! User Fail to Create.')->error();
            return redirect()->back();
        }

        flash('Success! User has Created Sucessfully.')->success();
        return redirect()->back();
    }

    public function remove(string $id): RedirectResponse
    {   
        if (User::where('id', $id)->first()->role == 'admin') {
            if (count(User::where('role', 'admin')->get()) <= 1) {
                flash('Failure! User cant be deleted.')->error();
                return redirect()->back();
            }
        }
        else{
            if (Order::where('user_id', $id)->exists()) {
                flash('Failure! User cant be deleted.')->error();
                return redirect()->back();
            }
        }

        User::where('id', $id)->delete();            

        flash('Success! User has Deleted Sucessfully.')->success();
        return redirect()->back();
    }
}
