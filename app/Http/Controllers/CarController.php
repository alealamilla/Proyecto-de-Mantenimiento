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
        $cars = Car::with('brand','owner','color','type')->paginate();
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
        $car = Car::create($request->validated());
        $this->authorize("create", Car::class);
        $id = $car->owner_id;

        return redirect()->route('owners.edit', $id)
            ->with('success', 'Vehículo guardado, puedes agregar más vehículos.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::with('brand','owner','color','type')->find($id);
        return view('car.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $owner_id = $car->owner_id;
        $owner = Owner::where("id", $owner_id)->first();
        $owners = Owner::all();
        $colors = Color::all();
        $brands = Brand::all();
        $types = Type::all();
        $this->authorize("update", $car);

        return view('car.edit', compact('car','owners','colors','brands','types','owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
        $car->update($request->validated());
        $this->authorize("update", $car);

        return redirect()->route('owners.index')
            ->with('success', 'Vehículo Actualizado con exito');
    }

    public function destroy($id)
    {
        Car::find($id)->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully');
    }

    public function preview($owner)
     {
         $cars = Car::with("brand")
             ->where("owner_id", $owner)->get();

         return response()->json($cars);
     }
}
