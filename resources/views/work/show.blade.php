@extends('layouts.app')

@section('template_title')
    {{ $work->name ?? __('Show') . " " . __('Work') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Work</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('works.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Reception Id:</strong>
                            {{ $work->reception_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Service Id:</strong>
                            {{ $work->service_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Sparepart Id:</strong>
                            {{ $work->sparepart_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Time:</strong>
                            {{ $work->time }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
