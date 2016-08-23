<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->only(['firstName', 'lastName']));
        $customer->save();
        return redirect("/client/{$customer->id}");
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.show', compact('customer'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
