@extends('layouts.app')

@section('template_title')
    {{ $type->name ?? __('Show') . " " . __('Type') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('types.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $type->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Brand Id:</strong>
                            {{ $type->brand_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
