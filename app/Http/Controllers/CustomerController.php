<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\SaveCustomerRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate('10');
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(SaveCustomerRequest $request)
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
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(SaveCustomerRequest $request, $id)
    {
        /** @var Customer $customer */
        $customer = Customer::findOrFail($id);
        $customer->update($request->only(['firstName', 'lastName']));
        return redirect($customer->path());
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect('/client');
    }
}
