@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Car
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
                        <form method="POST" action="{{ route('cars.update', $car->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('car.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
