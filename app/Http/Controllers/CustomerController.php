<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        return view('customers.index', ['customers' => Customer::all()]);
    }

    public function create() {
        return view('customers.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'full_name' => ['required', 'string'],
            'email'     => ['required', 'email'],
        ]);

        Customer::create($validated);
        return redirect()->route('customers.index')->with('success', 'Customer created!');
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id) {
        $customer = Customer::findOrFail($id);
        
        $validated = $request->validate([
            'full_name' => ['required', 'string'],
            'email'     => ['required', 'email'],
        ]);

        $customer->update($validated);
        return redirect()->route('customers.index')->with('success', 'Customer updated!');
    }
}
