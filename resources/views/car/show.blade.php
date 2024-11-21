@extends('layouts.app')

@section('template_title')
    {{ $car->name ?? __('Show') . " " . __('Car') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-primary-soft border-0 p-3">
                <div class="card-header bg-transparent border-0">
                    <div class="d-flex justify-content-between align-items-center">

                        <h4 id="card_title" class="text-primary text-uppercase">
                            <span class="ph--car-profile"></span> Vehículo
                        </h4>
                        </div>
                    </div>

                    <div class="card-body ">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Propietario:</strong>
                            {{ $car->owner->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Color:</strong>
                            {{ $car->color->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Marca: </strong>
                            {{ $car->brand->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Modelo: </strong>
                            {{ $car->type->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Placas:</strong>
                            {{ $car->placas }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Año:</strong>
                            {{ $car->year }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
