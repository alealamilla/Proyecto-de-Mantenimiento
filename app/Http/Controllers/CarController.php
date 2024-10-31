<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\CarRequest;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Owner;
use App\Models\Type;

/**
 * Class CarController
 * @package App\Http\Controllers
 */
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::paginate();
        $this->authorize("viewAny", Car::class);

        return view('car.index', compact('cars'))
            ->with('i', (request()->input('page', 1) - 1) * $cars->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $car = new Car();
        $owners = Owner::all();
        $colors = Color::all();
        $brands = Brand::all();
        $types = Type::all();
        $this->authorize("create", Car::class);
        return view('car.create', compact('car','owners','colors','brands','types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
        Car::create($request->validated());
        $this->authorize("create", Car::class);

        return redirect()->route('cars.index')
            ->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::find($id);
        return view('car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $owners = Owner::all();
        $colors = Color::all();
        $brands = Brand::all();
        $types = Type::all();
        $this->authorize("update", $car);

        return view('car.edit', compact('car','owners','colors','brands','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $car->update($request->validated());
        $this->authorize("update", $car);

        return redirect()->route('cars.index')
            ->with('success', 'Car updated successfully');
    }

    public function destroy($id)
    {
        Car::find($id)->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully');
    }
}
