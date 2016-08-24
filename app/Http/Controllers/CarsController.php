<?php

namespace App\Http\Controllers;

use App\Car;
use App\Contracts\CrudModel;
use App\Customer;
use App\Http\Requests\SaveCarRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate('10');
        return view('car.index', compact('cars'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('car.create', compact('customers'));
    }

    public function store(SaveCarRequest $request)
    {
        $car = Car::create($request->all());
        $car->save();
        return redirect("/voiture/{$car->id}");
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('car.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $customers = Customer::all();
        return view('car.edit', compact('car', 'customers'));
    }

    public function update(SaveCarRequest $request, $id)
    {
        /** @var Car $car */
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return redirect($car->path());
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect('/voiture');
    }
}
