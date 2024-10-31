<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\TypeRequest;
use App\Models\Brand;

/**
 * Class TypeController
 * @package App\Http\Controllers
 */
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::paginate();
        $this->authorize("viewAny", Type::class);

        return view('type.index', compact('types'))
            ->with('i', (request()->input('page', 1) - 1) * $types->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = new Type();
        $brands = Brand::all();
        $this->authorize("create", Type::class);
        return view('type.create', compact('type','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        Type::create($request->validated());
        $this->authorize("create", Type::class);
        return redirect()->route('types.index')
            ->with('success', 'Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $type = Type::find($id);

        return view('type.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $type = Type::find($id);
        $brands = Brand::all();
        $this->authorize("update", $type);

        return view('type.edit', compact('type','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, Type $type)
    {
        $type->update($request->validated());
        $this->authorize("update", $type);
        return redirect()->route('types.index')
            ->with('success', 'Type updated successfully');
    }

    public function destroy($id)
    {
        Type::find($id)->delete();

        return redirect()->route('types.index')
            ->with('success', 'Type deleted successfully');
    }
}
