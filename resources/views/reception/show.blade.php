@extends('layouts.app')

@section('template_title')
    {{ $reception->name ?? __('Show') . " " . __('Reception') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Reception</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('receptions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Owner Id:</strong>
                            {{ $reception->owner_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Car Id:</strong>
                            {{ $reception->car_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Reason:</strong>
                            {{ $reception->reason }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Reception Date:</strong>
                            {{ $reception->reception_date }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Status Id:</strong>
                            {{ $reception->status_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Next Reception:</strong>
                            {{ $reception->next_reception }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>User Id:</strong>
                            {{ $reception->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
