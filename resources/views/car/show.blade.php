@extends('layouts.app')

@section('template_title')
    {{ $car->name ?? __('Show') . " " . __('Car') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Car</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cars.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Owner Id:</strong>
                            {{ $car->owner_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Color Id:</strong>
                            {{ $car->color_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Brand Id:</strong>
                            {{ $car->brand_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Type Id:</strong>
                            {{ $car->type_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Placas:</strong>
                            {{ $car->placas }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Year:</strong>
                            {{ $car->year }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
