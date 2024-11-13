<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;

/**
 * Class BrandController
 * @package App\Http\Controllers
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate();
        $this->authorize("viewAny", Brand::class);

        return view('brand.index', compact('brands'))
            ->with('i', (request()->input('page', 1) - 1) * $brands->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = new Brand();
        $this->authorize("create", Brand::class);
        return view('brand.create', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        Brand::create($request->validated());
        $this->authorize("create", Brand::class);

        return redirect()->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brand = Brand::find($id);

        return view('brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        $this->authorize("update", $brand);

        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $brand->update($request->validated());
        $this->authorize("update", $brand);

        return redirect()->route('brands.index')
            ->with('success', 'Brand updated successfully');
    }

    public function destroy($id)
    {
        Brand::find($id)->delete();

        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully');
    }
}
