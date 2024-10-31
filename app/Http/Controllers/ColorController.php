<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\ColorRequest;

/**
 * Class ColorController
 * @package App\Http\Controllers
 */
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::paginate();
        $this->authorize("viewAny", Color::class);
        return view('color.index', compact('colors'))
            ->with('i', (request()->input('page', 1) - 1) * $colors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $color = new Color();
        $this->authorize("create", Color::class);
        return view('color.create', compact('color'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorRequest $request)
    {
        Color::create($request->validated());
        $this->authorize("create", Color::class);

        return redirect()->route('colors.index')
            ->with('success', 'Color created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $color = Color::find($id);

        return view('color.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $color = Color::find($id);
        $this->authorize("update", $color);

        return view('color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorRequest $request, Color $color)
    {
        $color->update($request->validated());
        $this->authorize("update", $color);
        return redirect()->route('colors.index')
            ->with('success', 'Color updated successfully');
    }

    public function destroy($id)
    {
        Color::find($id)->delete();

        return redirect()->route('colors.index')
            ->with('success', 'Color deleted successfully');
    }
}
