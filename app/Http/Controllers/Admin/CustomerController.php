<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customers.index', [
            'customers' => User::where('role', 'customer')->get()
        ]);
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer',
        ]);

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer berhasil ditambahkan');
    }

    public function edit(User $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, User $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $customer->update($request->only('name', 'email'));

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer berhasil diupdate');
    }

    public function destroy(User $customer)
    {
        $customer->delete();
        return back();
    }
}

