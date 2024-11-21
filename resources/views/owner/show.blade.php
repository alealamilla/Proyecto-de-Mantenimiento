@extends('layouts.app')

@section('template_title')
    {{ $owner->name ?? __('Show') . " " . __('Owner') }}
@endsection

@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card bg-primary-soft border-0 p-3t">
                <div class="card-header bg-transparent border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 id="card_title" class="text-primary text-uppercase">
                            <span class="fluent--people-list-16-filled"></span> Propietario
                        </h4>
                    </div>
                </div>

                    <div class="card-body ">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $owner->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Telefono:</strong>
                            {{ $owner->phone }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Email:</strong>
                            {{ $owner->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
